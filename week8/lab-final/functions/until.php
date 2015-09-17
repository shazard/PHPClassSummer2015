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

//checks if field is empty
function isFieldPopulated($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}

//gets contents of address groups db
function getAddressGroups() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address_groups ORDER BY address_group_id");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

//gets contents of addresses db for one user id
function getUserAddresses($value) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id");
    $binds = array(
        ":user_id" => $value            
        );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}
//debugging function to load entire contents of both relational databases
function getAllAddressesAndGroups() {
 
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address JOIN address_groups ON address.address_group_id = address_groups.address_group_id");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

//gets contents of addresses bd with connected address groups for one user, for one address group, sorted as directed
function getUserAddressesSortedForOneGroup($userid, $groupid, $sortBy) 
{
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address JOIN address_groups ON address.address_group_id = address_groups.address_group_id WHERE address.user_id = :user_id AND address.address_group_id = :address_group_id ORDER BY :sortBy DESC");
    $binds = array(
        ":user_id" => $userid,
        ":address_group_id"=> $groupid,
        ":sortBy" => $sortBy
        );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

//gets contents of addresses db for one user id, sorted, where a search is needed
function getUserAddressesByFieldSearch($userid, $sortBy, $searchedField, $searchedColumn) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address WHERE user_id = :user_id AND $SearchedColumn LIKE CONCAT(:searchedField, '%')ORDER BY :sortBy DESC");
    $binds = array(
        ":user_id" => $userid,
        ":sortBy" => $sortBy,
        ":searchedField" => $searchedField,
        ":searchedColumn" => $searchedColumn
        );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}