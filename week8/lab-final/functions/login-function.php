<?php

/*
 * users
 * user_id
 * email
 * password
 * 0{<br>user_id : 1<br>email : test@test.com<br>password : a94a8fe5ccb19ba61c4c0873d391e987982fbbd3<br>created : 2015-08-26 00:00:00<br>}<br> 
 */

function isValidUser( $email, $pass ) 
{
    
    $db = dbconnect();
    $resultsFromDB = array();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        $resultsFromDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['currentUserID'] = $resultsFromDB[0]['user_id'];
        $_SESSION['currentUserEmail'] = $resultsFromDB[0]['email'];
        return true;
    }
    
    return false;    
}

function logoutSession ()
{
    //found this code on stack overflow to make sure session data is removed thoroughly
    session_start();
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
}




