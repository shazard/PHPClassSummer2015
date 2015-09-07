<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
            
            //add cart count to each page with: echo getCartCount() like at top of categories include file
            //add link to this page at top of every page
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProductsAndCategories();
            
            $categorySelected = filter_input(INPUT_GET, 'cat');
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
                  
           
            // change the category page to a dropdown for selecting a category with a submit button
            //change the product page to an if input get, call product funtion for only category selected
            //add links to sort by different columns using function calls that sort database data differently
            
            
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            
            
            
            
        ?>
<!--        need to edit checkout page-->
        <a href="checkout.php">Check Out</a>
    </body>
</html>