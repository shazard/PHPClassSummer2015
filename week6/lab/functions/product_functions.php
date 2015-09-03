<?php
/*
 * products
 * product_id
 * category_id
 * product
 * price
 * image
 */
function createProduct($category_id, $product, $price, $image ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO products SET category_id = :category_id, product = :product, price = :price, image = :image ");
    $binds = array(
        ":category_id" => $category_id,
        ":product" => $product,
        ":price" => $price,
        ":image" => $image
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    return false;
}

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




function isValidProduct($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;    
}
function isValidPrice($value) {
    if ( empty($value) ) {
        return false;
    }
    return true;
}

function getAllProducts($value) {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products WHERE category_id = :category_id");
    $binds = array(
        ":category_id" => $value            
        );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}
function getAllProductsAndCategories() {
    //debugging function to load entire contents of both relational databases
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products JOIN categories ON products.category_id = categories.category_id");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}

function getAllInfoForOneProduct($value) 
{
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM products JOIN categories ON products.category_id = categories.category_id WHERE product_id = :product_id");
    $binds = array(
        ":product_id" => $value            
        );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
    return $results;
    
}