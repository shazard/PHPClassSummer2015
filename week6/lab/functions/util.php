<?php


//            //print entire array with keys
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