

<p><?php echo getCartCount(); ?>  items in cart</p><br>
<a href="checkout.php" class="btn btn-default">Check Out</a>
<hr>

<?php if ( isset($allCategories) ) : ?>


<h1>Choose a category to narrow selection</h1><br>
<form method="post" action="#">
            
            Select Category:
            <select name="category_id">
            <?php 
                $chosenCategory = filter_input(INPUT_POST, "category_id");
                foreach ($allCategories as $row): ?>
                <option value="<?php echo $row['category_id']; ?>"<?php if ($row['category_id'] == filter_input(INPUT_POST, "category_id")) echo "selected";?>>
                    <?php echo $row['category']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            <input type="submit" value="Submit" class="btn btn-default" />
</form>
<hr>
        
      
        
<?php   
        //narrow products to only chosen category by calling different function and filling same array
        if (isset($chosenCategory))
        {
            $allProducts = getAllProducts($chosenCategory);
        }
        endif; 
?>
   