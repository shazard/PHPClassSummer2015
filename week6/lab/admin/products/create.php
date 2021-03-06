<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        // put your code here
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category_functions.php';
        include_once '../../functions/product_functions.php';
        include_once '../../functions/util.php';
        
        
        $categories = getAllCategories();
        
        
        if ( isPostRequest() ) {
            
            $category_id = filter_input(INPUT_POST, 'category_id');
            $product = filter_input(INPUT_POST, 'product');
            $price = filter_input(INPUT_POST, 'price');
            
                        
            $errors = array();
            
            if ( !isValidProduct($product) ) {
                $errors[] = 'Product is not Valid';
            }
            
            if ( !isValidPrice($price) ) {
                $errors[] = 'Price is not Valid';
            }
            
            if ( count($errors) == 0 ) {
                
                $image = uploadProductImage();
                if ( empty($image) ) {
                $errors[] = 'image could not be uploaded';
                }
                
                    if ( createProduct($category_id, $product, $price, $image ) ) {
                        $results = 'Product Added';
                    } else {
                        $results = 'Product was not Added';
                    }
                
                
            }
            
        }
        
        
        
        ?>
        
        <h1>Add Product</h1>
        
        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        
        <?php include '../../includes/results.html.php'; ?>
               
        <form method="post" action="#" enctype="multipart/form-data">
            
            Category:
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            
            
            Product Name : <input type="text" name="product" value=""  /> 
            <br />
            Price : <input type="text" name="price" value="" /> 
            <br />
            Image: <input name="upfile" type="file" />
             <br />
            <input type="submit" value="Submit" />
        </form>
        
        
        
    </body>
</html>