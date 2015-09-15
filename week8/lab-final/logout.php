<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include_once 'functions/login-function.php';
        
        
        logoutSession ();
        header('Location: index.php');
        exit;
        
        
        ?>
    </body>
</html>
