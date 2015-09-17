<h4>Your Address Book</h4><br>
<?php
//form gets $selectedAddressGroupId, $searchIndex and $searchField from user
include 'includes/searchsortform.html.php';
?>

       
<?php   
        //narrow products to only chosen category by calling different function and filling same array
        if (isset($selectedAddressGroupId))
        {
            $displayUserAddressInfo = getUserAddressesSortedForOneGroup($currentUserID, $selectedAddressGroupId, $sortBy);
        }
        if (isset($selectedAddressGroupId) && isset($searchIndex))
        {
            $displayUserAddressInfo = getUserAddressesSortedForOneGroup($userid, $groupid, $sortBy) ;
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