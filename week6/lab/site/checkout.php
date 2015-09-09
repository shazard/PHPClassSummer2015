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
            require_once '../functions/product_functions.php'; ?>
        
            <?php 
                $emptycart = filter_input(INPUT_POST, 'empty_cart');

                if ($emptycart == "Empty Cart")
                {
                    emptyCart();
                }
            ?>
            
            <p><?php echo getCartCount(); ?>  items in cart</p>
            <p><a href="index.php">Go Back To Shopping Page</a></p>
                        
            <?php
            startCart(); 
            
            
            $total = 0;
            
            $checkoutProducts = array();
            
            $items = getCart();
            
            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);
            }
            
            
            include '../includes/checkout.html.php';
            

        ?>
    </body>
</html>
