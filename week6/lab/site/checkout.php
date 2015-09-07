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
            
            //add number of items in cart to top of page. 
            //change  checkout include page to have links at top that change sort order by clicking a button
            //try a var dump of the checkoutproducts array to see if there's a way to sort by each?
            
            $total = 0;
            
            $checkoutProducts = array();
            
            $items = getCart();
            
            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);
            }
            
            
            include '../includes/checkout.html.php';
            
            //add button to empty cart with if _input post = empty call empty cart function
        ?>
    </body>
</html>
