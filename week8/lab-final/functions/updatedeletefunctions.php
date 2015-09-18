<?php

function updateProduct($existingProductID, $newCategory_id, $product, $price, $image)
{
            
    $db = dbconnect();
                            
    $stmt = $db->prepare("UPDATE products SET category_id = :newCategory_id, product = :product, price = :price, image = :image WHERE product_id = :existingProductID");

    $binds = array(
        
        ":existingProductID" => $existingProductID,
        ":newCategory_id" => $newCategory_id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image        
        );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        return true;
    }
    else 
    {
        return false;
    }
            
}

function deleteProduct($value)
{
    $db = dbconnect();
                            
    $stmt = $db->prepare("DELETE FROM products where product_id = :dropProduct");

    $binds = array(
        ":dropProduct" => $value
            
        );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
    {
        return true;
    }
    else 
    {
        return false;
    }
}