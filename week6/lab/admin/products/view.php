<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category_functions.php';
        include_once '../../functions/product_functions.php';
        include_once '../../functions/util.php';
        
        
        $categories = getAllCategories();
        
        
            $category_id = filter_input(INPUT_POST, 'category_id');

            
            
        
        
        
        
        
        ?>
        
        <h1>View Products</h1>

        <form method="post" action="#">
            
            Category:
            <select name="category_id">
            <?php foreach ($categories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>" <?php if ($row['category_id'] == $category_id) echo "selected";?>>
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            <input type="submit" value="Submit" />
        </form>    
            
                
        <?php if (isset($_POST['category_id'])): ?>
        <?php 

            $products = getAllProducts($category_id);

            ?>
        
            <table class="table">
            <thead>
                <tr>
                    <th>Products</th>
                </tr>
            </thead>
                <?php foreach ($products as $row): ?>
                <tr>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="Update.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
        
</html>