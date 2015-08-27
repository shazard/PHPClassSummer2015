<?php

function createProduct ($category_id, $product, $price, $image)
{
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image");
    $binds = array(
    ":category_id" => $category_id,                       
    ":product" => $product,                      
    ":price" => $price,                      
    ":image" => $image                       
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        return true;
    }
    
}