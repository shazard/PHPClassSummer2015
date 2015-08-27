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
        
        
        if ( isPostRequest() ) {
            
            $category = filter_input(INPUT_POST, 'category');
                                    
            if ( isValidCategory($category) ) {
                
                if ( createCategory($category) ) {
                    $results = 'Category added';
                } else {
                    $results = 'Category was not added';
                }
                               
            } else {
               $results = 'Category is not valid';
            }
            
            
        }
        
        
        ?>
        
         <h1>Add Category</h1>
        
        <?php if ( isset($results) ) : ?>
            <h2><?php echo $results; ?></h2>
        <?php endif; ?>
               
        <form method="post" action="#">
            Category Name : <input type="text" name="category" value="" />
            <input type="submit" value="Submit" />
        </form>
        
        
    </body>
</html>