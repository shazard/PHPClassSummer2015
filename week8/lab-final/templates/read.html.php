<?php
        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
        $currentAddressID = filter_input(INPUT_GET, 'view_address_id');
        $_SESSION['currentAddress'] = $currentAddressID;
        $viewAddress = getSingleAddress($currentUserID, $currentAddressID);
?>

<h1 class="cover-heading">Read Page</h1>



<div class="row">
        <table class="table">
            <td><b>Name</b></td>
            <td><b>Address</b></td>
            <td><b>Email</b></td>
            <td> </td>
            <?php foreach ($viewAddress as $row): ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><a href="http://maps.google.com/?q=<?php echo $row['address']; ?>" target="_blank"><?php echo $row['address']; ?></a></td>
                    <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                </tr>
                <tr>
                    <td><b>Phone</b></td>
                    <td><b>Website</b></td>
                    <td><b>Birthday</b></td>
                </tr>
                <tr>
                    <td><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></td>
                    <td><a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['website']; ?></a></td>
                    <td><?php echo date("m/d/Y", strtotime($row['birthday'])); ?></td>
                </tr>
                <tr>
                    <td><b>Photo</b></td>
                </tr>
                <tr>
                    <td><img src="images/<?php echo $row['image']; ?>" height="100"  /></td>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="?view=userdefault&user_view=update">
                            <input type="submit" value="Update" class="btn btn-default" />
                        </form>
                    </td>
                    
                    <td>
                        <form method="post" action="?view=userdefault&user_view=delete&view_address_id=<?php echo $currentAddressID;?>">
                            <input type="submit" value="Delete" class="btn btn-default" />
                        </form>
                    </td>
                </tr>    
            <?php endforeach; ?>
        </table>
    </div>