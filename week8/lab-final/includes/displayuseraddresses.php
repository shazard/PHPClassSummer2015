<h4>Your Address Book</h4><br>
<?php
//form gets $selectedAddressGroupId, $searchIndex and $searchField from user
//$sortby is set on userdefault page to 'fullname' as a default value

    $addressGroups = getAddressGroups();
    $sortBy = 'fullname';
    $displayUserAddressInfo = getUserAddresses($currentUserID, $sortBy);

include 'includes/searchsortform.html.php';

?>

<p><?php //var_dump($currentUserID); var_dump($sortBy); var_dump($searchField); var_dump($searchIndex); var_dump($sortIndex); var_dump($displayUserAddressInfo);?></p>
       
<?php   
        //narrow display to only chosen category or search by calling different function and filling same array
        //or search for specific text in a given field
        if (isset($selectedAddressGroupId))
        {
            $displayUserAddressInfo = getUserAddressesSortedForOneGroup($currentUserID, $selectedAddressGroupId, $sortBy);
        }
        if ((isset($searchIndex)))
        {
            $displayUserAddressInfo = searchDatabase($currentUserID, $searchIndex, $searchField) ;
        }
        if ((isset($sortIndex)))
        {
            $displayUserAddressInfo = getUserAddresses($currentUserID, $sortIndex) ;
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
                        <form method="post" action="?view=userdefault&user_view=read&view_address_id=<?php echo $row['address_id']?>">
                            <input type="submit" value="View Detail" class="btn btn-default" />
                        </form>
                    </td>
                </tr>    
            <?php endforeach; ?>
        </table>
    </div>


 <?php else: ?>       
        <h2>No Addresses Found</h2>        
<?php endif; ?>