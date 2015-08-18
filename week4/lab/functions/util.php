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

function fillColumnArray() {
    $columnArray = array("ID", "Corporation Name", "Incorporation Date", "Email", "Zip Code", "Owner", "Phone");
 
    return $columnArray;
}