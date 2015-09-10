

<p><?php echo getCartCount(); ?>  items in cart</p>

<?php if ( isset($allCategories) ) : ?>

        
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
            <input type="submit" value="Submit" />
</form>
<hr>
        
      
        
<?php   if (isset($chosenCategory))
        {
            $allProducts = getAllProducts($chosenCategory);
        }
        endif; 
?>
   