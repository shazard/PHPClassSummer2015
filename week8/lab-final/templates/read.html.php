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
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td><b>Phone</b></td>
                    <td><b>Website</b></td>
                    <td><b>Birthday</b></td>
                </tr>
                <tr>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['website']; ?></td>
                    <td><?php echo $row['birthday']; ?></td>
                </tr>
                <tr>
                    <td><b>Photo</b></td>
                </tr>
                <tr>
                    <td><?php echo $row['image']; ?></td>
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