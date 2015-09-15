<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Address Book Manager</title>
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once 'includes/session-start.req-inc.php';
            
            include_once 'functions/dbconnect.php';
            include_once 'functions/login-function.php';
            include_once 'functions/until.php'; 
            
            
            
        
        $view = filter_input(INPUT_GET, 'view');
        
        
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
                include './templates/links.html.php';
            }
        
        
        
        
        if ( $view === 'add' ) {
            
            include './templates/add.html.php';
        } else if (  $view === 'update' ) {
            
            include './templates/update.html.php';
        } else if (  $view === 'delete' ) {
            
            include './templates/delete.html.php';
        } else {
            /* Default view */
            
            include './templates/default.html.php';
        }
        
        ?>
        
        <?php include 'includes/results.html.php'; ?>
        
        <?php 
        
        include 'includes/loginform.html.php';
      
        
        ?>
        
        <a href="logout.php">Log Out</a>
    </body>
</html>
