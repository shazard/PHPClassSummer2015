<?php
/*
 * address sheet fields:
 * address_id*
 * user_id - key to users
 * address_group_id - key to address_groups
 * fullname
 * email
 * address
 * phone
 * website
 * birthday - datetime
 * image
 */

function updateAddress($existingAddressID, $newAddressGroup_id, $fullname, $address, $email, $phone, $website, $birthday, $image)
{            
    $db = dbconnect();
                            
    $stmt = $db->prepare("UPDATE address SET address_group_id = :newAddressGroup_id, fullname = :fullname, address = :address, email = :email, phone = :phone, website = :website, birthday = :birthday, image = :image WHERE address_id = :existingAddressID");

    $binds = array(
        
        ":existingAddressID" => $existingAddressID,
        ":newAddressGroup_id" => $newAddressGroup_id,
        ":fullname" => $fullname,
        ":address" => $address,
        ":email" => $email,               
        ":phone" => $phone,        
        ":website" => $website,        
        ":birthday" => $birthday,        
        ":image" => $image        
        );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        return true;
    }
    else 
    {
        return false;
    }            
}

function deleteAddress($existingAddressID)
{
    $db = dbconnect();
                            
    $stmt = $db->prepare("DELETE FROM address where address_id = :dropAddress");

    $binds = array(
        ":dropAddress" => $existingAddressID
            
        );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        return true;
    }
    else 
    {
        return false;
    }
}