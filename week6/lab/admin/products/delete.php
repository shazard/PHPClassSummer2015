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
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/product_functions.php';
        include_once '../../functions/category_functions.php';
        include_once '../../functions/util.php';
        
        $existingProductID = filter_input(INPUT_GET, 'product_id');
        $product = getAllInfoForOneProduct($existingProductID);
        
        if ( isPostRequest() ) 
        {
            if (deleteProduct($existingProductID)) 
            {
                $results = 'Product deleted';
                $categories = getAllCategories();
                $isDeleted = true;
            } 
            else 
            {
                $results = 'Error: Product was not deleted.';
            }
        }
        ?>
        
    <?php include '../../includes/results.html.php'; ?>
        
        
     
        
    <?php if (!isset($isDeleted)) : ?>
    
    <form method="post" action="#">    
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
        <input type="submit" value="Submit" />
            
    </form>    
    <?php  endif;  ?>
        <hr>
        <a href="view.php">Return to View Products</a>
    </body>
</html>
