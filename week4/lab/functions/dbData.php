<?php

function getAllDatabaseData()
{
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

/*
 * $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");
 */
function searchDatabase($column, $userSearch)
{
    
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE CONCAT(:search, '%')");
    
    $binds = array(
            ":search" => $userSearch,
            );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  
    return $results;
  
}

function sortDatabase ($column, $order)
{
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) 
    {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

