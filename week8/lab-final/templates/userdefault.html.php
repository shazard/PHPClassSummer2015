<?php

    require_once 'includes/session-start.req-inc.php';
    require_once 'includes/access-required.html.php';
    //echo $_SESSION['currentUserID'];

    $currentUserID = $_SESSION['currentUserID'];
 
    $userView = filter_input(INPUT_GET, 'user_view');
?>
<h1 class="cover-heading">Welcome To Our Site, <?php echo $_SESSION['currentUserEmail']; ?></h1>

<hr>

<?php
//include 'includes/displayuseraddresses.php';
?>

<?php       

                if ( $userView === 'read' ) 
                {
                    //user view of detailed address info and update/delete access
                    include './templates/read.html.php';
                } 
                else if (  $userView === 'update' ) 
                {
                    //user access to update item
                    include './templates/update.html.php';
                }
                else if (  $userView === 'delete' ) 
                {
                    //user access to delete item
                    include './templates/delete.html.php';
                }

                else
                {
                    /* Default view for full address book*/
                    include 'includes/displayuseraddresses.php';
                }

?>


