<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/product_functions.php';
        include_once '../../functions/category_functions.php';
        include_once '../../functions/util.php';
        
        $existingProductID = filter_input(INPUT_GET, 'product_id');
        $product = getAllInfoForOneProduct($existingProductID);
        $categories = getAllCategories();
        $categoryDropDown = $product[0]['category_id'];
        
      
        
//debugging code to print contents of page arrays
//                                        //print entire array with keys
//            $keys = array_keys($product);
//            for($i = 0; $i < count($product); $i++) 
//            {
//                echo $keys[$i] . "{<br>";
//                foreach($product[$keys[$i]] as $key => $value) 
//                {
//                    echo $key . " : " . $value . "<br>";
//                }
//                echo "}<br>";
//            }
//            
//                                //print entire array with keys
//            $keys = array_keys($categories);
//            for($i = 0; $i < count($categories); $i++) 
//            {
//                echo $keys[$i] . "{<br>";
//                foreach($categories[$keys[$i]] as $key => $value) 
//                {
//                    echo $key . " : " . $value . "<br>";
//                }
//                echo "}<br>";
//            }
        
        
        
        
        
        if ( isPostRequest() ) 
            {
            
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
                
                if ( updateProduct($existingProductID, $category_id, $product, $price, $image) ) {
                    $results = 'Product Updated';
                    $isUpdated = true;
                } else {
                    $results = 'Product was not Updated';
                }
                
            }
            
        }

    ?>
        
        <?php include '../../includes/results.html.php'; ?>
        
        <?php if (!isset($isUpdated)) : ?>
        
            <table>
                <thead>
                    <tr>
                        <th><h3>Existing Product Information</h3></th>
                    </tr>
                </thead>
                    <tr>
                        <td><?php echo $product[0]['category']; ?></td>
                        <td><?php echo $product[0]['product']; ?></td>                    
                        <td><?php echo $product[0]['price']; ?></td>                    
                        <td><?php echo $product[0]['image']; ?></td>                    
                    </tr>

                </table>



            <h3>New Product Information</h3>

            <?php if ( isset($errors) && count($errors) > 0 ) : ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>




            <form method="post" action="#" enctype="multipart/form-data">

                Category:
                <select name="category_id">
                <?php foreach ($categories as $row): ?>
                    <option value="<?php echo $row['category_id']; ?>"<?php if ($row['category_id'] == $categoryDropDown) echo "selected";?>>
                        <?php echo $row['category']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br />


                Product Name : <input type="text" name="product" value="<?php echo $product[0]['product']; ?>" /> 
                <br />
                Price : <input type="text" name="price" value="<?php echo $product[0]['price']; ?>" /> 
                <br />
                Image: <input name="upfile" type="file" />
             <br />
                <input type="submit" value="Submit" />
            </form>


        <?php endif; ?>

    </body>
</html>
