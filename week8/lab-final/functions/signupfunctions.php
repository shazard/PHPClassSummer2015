<?php

// users
//user_id*
//email
//password
//created

//checks email, checks password, and attempts to add new user
function doCreateUser($email, $password) {
    if (isValidEmail($email))
    {
        if (isValidPassword($password))
        {
            $db = dbconnect();
            $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");
            $binds = array(
                ":email" => $email,
                ":password" => sha1($password)
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                return true;
            }
        }
    }
     
    return false;
    
}

function isValidPassword($value) {
    if ( empty($value) ) {
        return false;
    }
    //allows only letters or numbers, no special characters.
    if ( preg_match("/^[a-zA-Z0-9]+$/", $value) == false ) {
        return false;
    }
    
    return true;
    
}

function isItemInDB($itemToCheck, $keyToCheck, $dbSheetToCheck)
{
            $db = dbconnect();
            
            //get list of sites to compare with site entered
            $stmt = $db->prepare("SELECT * FROM $dbSheetToCheck");
            $contentsOfDB = array();
            $newArrayToCheck = array();
 
            if ($stmt->execute() && $stmt->rowCount() > 0) 
            {
                $contentsOfDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

//            //print entire array with keys for testing purposes
//            $keys = array_keys($contentsOfDB);
//            for($i = 0; $i < count($contentsOfDB); $i++) 
//            {
//                echo $keys[$i] . "{<br>";
//                foreach($contentsOfDB[$keys[$i]] as $key => $value) 
//                {
//                    echo $key . " : " . $value . "<br>";
//                }
//                echo "}<br>";
//            }

            for($i = 0; $i < count($contentsOfDB); $i++)
            {
                $newArrayToCheck[$i] = $contentsOfDB[$i][$keyToCheck];
            }
            
            if (in_array($itemToCheck, $newArrayToCheck)== false)
            {
                return false;
            }
            else
            {
                return true;
            }
}