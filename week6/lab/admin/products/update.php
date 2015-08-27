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
        include_once '../../functions/product_functions.php';
        include_once '../../functions/util.php';
        
        
        $categories = getAllCategories();
        
        
        ?>
        
        <h1>View Products</h1>

        <form method="post" action="#">
            
            Category:
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
            
                
        <?php if (isset($_POST['category_id'])): ?>
        <?php 
            $category_id = filter_input(INPUT_POST, 'category_id');
            var_dump($category_id);
            $products = getAllProducts($category_id);
            var_dump($products);
            ?>
        
            <table class="table">
            <thead>
                <tr>
                    <th>Products</th>
                </tr>
            </thead>
                <?php foreach ($products as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><a href="Update.php?id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
        
</html>