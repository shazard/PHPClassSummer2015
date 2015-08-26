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

function sendToCurl($checkThisSite) {
    
        /*
         * http://php.net/manual/en/curl.examples.php
         * http://php.net/manual/en/curl.examples-basic.php
         */
         // create curl resource 
        $curl = curl_init(); 

        // set url 
        curl_setopt($curl, CURLOPT_URL, $checkThisSite); 

        //return the transfer as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($curl); 
        
        // close curl resource to free up system resources 
        curl_close($curl);    

        return $output;
    
}

function filterRegEx($textToCheck){
            $urlRegEx = '/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
            preg_match_all($urlRegEx, $textToCheck, $outputMatches);
            $removeDuplicates = array_unique($outputMatches[0]);
            return $removeDuplicates;
}

function isItemInArray($itemToCheck, $keyToCheck, $dbSheetToCheck)
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
