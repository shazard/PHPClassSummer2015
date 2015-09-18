<?php
        require_once 'includes/session-start.req-inc.php';
        require_once 'includes/access-required.html.php';
?>

<h1 class="cover-heading">Delete Page</h1>


<form method="post" action="?view=userdefault&user_view=read&view_address_id=<?php echo $_SESSION['currentAddress'];?>">
    <input type="submit" value="Return To View" class="btn btn-default" />
</form>