<?php


        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
        //echo $_SESSION['currentUserID'];
?>
<h1 class="cover-heading">Welcome To Our Site, User # <?php echo $_SESSION['currentUserID']; ?></h1>
