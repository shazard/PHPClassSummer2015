<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

/**
 * A method to check if a Get request has been made.
 *    
 * @return boolean
 */
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}
//check email address for validity
function isValidEmail($value) {
    if ( empty($value) ) {
        return false;
    }
    if ( filter_var($value, FILTER_VALIDATE_EMAIL) == false ) {
            return false;
    }
    
    return true;
}

function isFieldPopulated($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}

function getAddressGroups() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups ORDER BY address_group_id");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}