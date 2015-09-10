


<?php if ( isset($checkoutProducts) && count($checkoutProducts) > 0 ) : ?>
<table>
    <th>Product</th>
    <th>Price</th>
    <?php foreach ($checkoutProducts as $row): ?>

        <tr>            
            <td><?php echo $row['product']; ?></td>
            <td><?php echo $row['price']; ?></td>
        </tr>    
    <?php $total = $total + $row['price']; endforeach; ?>   
        
         <tr>            
            <td>Total</td>
            <td><?php echo $total; ?></td>
        </tr>  
</table>
<hr>

<form method="post" action="#">
    <input type="submit" name="empty_cart" value="Empty Cart" />

</form>
            

 <?php else: ?>       
        <h2>No Products Found</h2>

<?php endif; ?>

