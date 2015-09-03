
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
        
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category_functions.php';
        include_once '../../functions/util.php';
        
        $categories = getAllCategories();
        
        if ( isPostRequest() ) 
        {
            
            $deleteCategoryID = filter_input(INPUT_POST, 'category_id');
            
            if (deleteCategory($deleteCategoryID) ) 
            {
                $results = 'Category deleted';
                $categories = getAllCategories();
            } 
            else 
            {
                $results = 'Category was not deleted. All products must be deleted first.';
            }
        }
        ?>

        
        <h1>Delete Category</h1>
        
        <?php include '../../includes/results.html.php'; ?>
               
        <form method="post" action="#">
            
            Category To Delete:
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>">
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />            
            <input type="submit" value="Submit" />
            
        </form>
        
    </body>
</html>
