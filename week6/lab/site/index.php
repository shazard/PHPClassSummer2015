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
            
            //add cart count to each non admin page with: echo getCartCount() like at top of categories include file
            //add link to this page at top of every non admin page
            
            $allCategories = getAllCategories();
            $allProducts = getAllProductsAndCategories();

            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                  
           
          
            //change the product include page to an if input get, call product funtion for only category selected
            //add links to sort by different columns using function calls that sort database data differently
            //      using table headers with links? no table headers now
            
            
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            
            
            
            
        ?>
<!--        need to edit checkout page-->
        <a href="checkout.php">Check Out</a>
    </body>
</html>
