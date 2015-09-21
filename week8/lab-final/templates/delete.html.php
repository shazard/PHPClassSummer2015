<?php
        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
        
        $addressToDelete = getSingleAddress($_SESSION['currentUserID'], $_SESSION['currentAddress']);
?>

<h1 class="cover-heading">Delete</h1>


<form method="post" action="?view=userdefault">
    <input type="submit" value="Return To View All" class="btn btn-default" />
</form>

<hr>
    <?php
        if ( isPostRequest() ) 
        {
            if (deleteAddress($_SESSION['currentAddress'])) 
            {
                $results = 'Deleted';
                
                $isDeleted = true;
            } 
            else 
            {
                $results = 'Error: address was not deleted.';
            }
        }
        include 'includes/results.html.php';
    ?>

 

    <?php if (!isset($isDeleted)) : ?>
    <form method="post" action="?view=userdefault&user_view=read&view_address_id=<?php echo $_SESSION['currentAddress'];?>">
        <input type="submit" value="Return To View Item" class="btn btn-default" />
    </form>
    <br>
    <form method="post" action="#">    
        <table>
            <thead>
                <tr>
                    <th><h3>Confirm Deletion</h3></th>
                </tr>
            </thead>
            <tr><td><h3>WARNING, THIS CAN NOT BE UNDONE</h3></td></tr>
                <tr><td><?php echo $addressToDelete[0]['fullname']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['address']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['email']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['phone']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['website']; ?></td></tr>
                <tr><td><?php echo date("m/d/Y", strtotime($addressToDelete[0]["birthday"])); ?></td></tr>
                <tr><td><img src="images/<?php echo $addressToDelete[0]['image']; ?>" height="100"  /></td></tr>          
        </table>
        <br><br>
        <input type="submit" value="DELETE" />            
    </form>
    <br><br>


    <?php  endif;  ?>

<?php if (isset($isDeleted)) : ?>
<table>
        <table>
            <thead>
                <tr>
                    <th><h3>The below information has been deleted from your address book</h3></th>
                </tr>
            </thead>
            <tr>
                <tr><td><?php echo $addressToDelete[0]['fullname']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['address']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['email']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['phone']; ?></td></tr>
                <tr><td><?php echo $addressToDelete[0]['website']; ?></td></tr>
                <tr><td><?php echo date("m/d/Y", strtotime($addressToDelete[0]["birthday"])); ?></td></tr>
                <tr><td><img src="images/<?php echo $addressToDelete[0]['image']; ?>" height="100"  /></td></tr>      
            </tr>            
        </table>
<?php endif; ?>

