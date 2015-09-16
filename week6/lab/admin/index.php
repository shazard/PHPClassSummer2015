<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Functions</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        
            require_once '../includes/session-start.req-inc.php';
            
            include_once '../functions/dbconnect.php';
            include_once '../functions/login-function.php';
            include_once '../functions/util.php';
        
            if ( isPostRequest() ) {
                
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'pass');
                
                if ( isValidUser($email, $password) ) {
                    $_SESSION['isValidUser'] = true;                    
                } else {
                    $results = 'Sorry please try again';
                }
               
            }
            
            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) {
                include '../includes/admin-links.html.php';
            }
            
        ?>
        
        <a href="../index.php" class="btn btn-default">Return Home</a><br><br>        
        
        <?php include '../includes/loginform.html.php'; ?>
 
    </body>
</html>

