<h3>Choose a group to narrow selection</h3><br>
<form method="post" action="#">
            <select name="selected_address_group" class="form-control">
            <?php                
                $selectedAddressGroupId = filter_input(INPUT_POST, 'selected_address_group');
                foreach ($addressGroups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>"<?php if ($row['address_group_id'] == filter_input(INPUT_POST, "$selectedAddressGroupId")) echo "selected";?>>
                    <?php echo $row['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" value="Submit" class="btn btn-default" />
</form>
<br>
       
<?php   
        //narrow products to only chosen category by calling different function and filling same array
        if (isset($selectedAddressGroupId))
        {
            $displayUserAddressInfo = getUserAddressesForOneGroup($currentUserID, $selectedAddressGroupId, $sortBy);
        }
        
        
        if ( isset($displayUserAddressInfo) && count($displayUserAddressInfo) > 0 ) : ?>

<div class="row">
        <table class="table">
            <td><b>Name</b></td>
            <td><b>Address</b></td>
            <td> </td>
            <?php foreach ($displayUserAddressInfo as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <form method="post" action="?view=userdefault&user_view=read">
                            <input type="submit" value="View Detail" class="btn btn-default" />                            
                            <input type="hidden" name="view_address_id" value="<?php echo $row['address_id']; ?>" />
                        </form>
                    </td>
                </tr>    
            <?php endforeach; ?>
        </table>
    </div>


 <?php else: ?>       
        <h2>No Addresses Found</h2>
<?php endif; ?>