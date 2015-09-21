<?php
        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
        $currentAddressID = filter_input(INPUT_GET, 'view_address_id');
        $_SESSION['currentAddress'] = $currentAddressID;
        $viewAddress = getSingleAddress($currentUserID, $currentAddressID);
        if ($viewAddress[0]['address_group_id'] == 1)
        {
                $displayGroup = 'View Friend';
        }
        else if ($viewAddress[0]['address_group_id'] == 2)
        {
                $displayGroup = 'View Family Member';
        }
        else if ($viewAddress[0]['address_group_id'] == 3)
        {
                $displayGroup = 'View Coworker';
        }
       else
       {
           $displayGroup = 'Unknown Group Type';
       }
?>

<h1 class="cover-heading"><?php echo $displayGroup;?></h1>



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
                    <td>
                        <?php if ( empty($row['image']) ) : ?>
                        <p class="btn btn-danger">No Photo Uploaded</p>
                        <?php else: ?>                        
                            <img src="images/<?php echo $row['image']; ?>" height="100"  />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="?view=userdefault&user_view=update" class="btn btn-default">Update</a>
                    </td>                    
                    <td>
                        <a href="?view=userdefault&user_view=delete" class="btn btn-default">Delete</a>
                    </td>
                </tr>    
            <?php endforeach; ?>
        </table>
    </div>