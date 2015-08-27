<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category_functions.php';
        include_once '../../functions/util.php';
        include_once '../../functions/product_functions.php';
        
        
        ?>
        
        <h1>Add Product</h1>
        
        <?php if ( isset($results) ) : ?>
            <h2><?php echo $results; ?></h2>
        <?php endif; ?>
               
        <form method="post" action="#">
            
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            
            
            Product Name : <input type="text" name="product" value="" /> 
            <br />
            Price : <input type="text" name="price" value="" /> 
            <br />
            <input type="submit" value="Submit" />
        </form>
        
        
        
    </body>
</html>
