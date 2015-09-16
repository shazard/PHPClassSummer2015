<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once '../includes/session-start.req-inc.php';
            require_once '../functions/cart_functions.php';
            require_once '../functions/dbconnect.php';
            require_once '../functions/util.php';
            require_once '../functions/category_functions.php';
            require_once '../functions/product_functions.php';
                        
            startCart();  

            //load lists of categories and products for use on site
            //$allCategories will be updated to smaller list if category is selected
            $allCategories = getAllCategories();
            $allProducts = getAllProductsAndCategories();

            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            //add products when selected for buy
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                  
         
            //include categories dropdown page and products list
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            
            
            
            
        ?>

        <a href="checkout.php" class="btn btn-default">Check Out</a>
    </body>
</html>
