<?php

// users
//user_id*
//email
//password
//created


function doCreateUser($email, $password) {
    if (isValidEmail($email))
    {
        if (isValidPassword($password))
        {
            $db = dbconnect();
            $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");
            $binds = array(
                ":email" => $email,
                ":password" => $password
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                return true;
            }
        }
    }
     
    return false;
    
}

function isValidEmail($value) {
    if ( empty($value) ) {
        return false;
    }
    if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
            return false;
    }
    
    return true;
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