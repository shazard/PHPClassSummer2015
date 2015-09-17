<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Address Book Manager</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <?php
            require_once 'includes/session-start.req-inc.php';
            
            include_once 'functions/dbconnect.php';
            include_once 'functions/login-function.php';
            include_once './functions/signupfunctions.php';
            include_once './functions/addfunctions.php';
            include_once 'functions/until.php'; 
            
                               
                $view = filter_input(INPUT_GET, 'view');
                if ( isPostRequest() ) {

                        $email = filter_input(INPUT_POST, 'email');
                        $password = filter_input(INPUT_POST, 'pass');

                        if ( isValidUser($email, $password) ) {
                            $_SESSION['isValidUser'] = true;
                            header('Location: index.php?view=userdefault');

                        } 
                        
                        else 
                        {
                            if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true )
                            {
                            $results = 'Invalid Login. Sorry, please try again';
                            }
                        }
                    }
        ?>
        
    <nav>
        <ul class="nav nav-pills nav-justified">
            <li role="presentation"><h3> &nbsp; Address Manager</h3></li>                                      
        <?php            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) 
            {
                include './templates/links.html.php';
            }            
        ?>
        </ul>

    </nav>


    <div class="container">

      <div class="starter-template">
<!--          <h1>&nbsp;</h1>-->
            <?php       

                if ( $view === 'add' ) 
                {
                    //add new item page
                    include './templates/add.html.php';
                } 
                else if (  $view === 'update' ) 
                {
                    //update item page
                    include './templates/update.html.php';
                }
                else if (  $view === 'delete' ) 
                {
                    //delete item page
                    include './templates/delete.html.php';
                }
                else if (  $view === 'signup' ) 
                {
                    //new user sign up page
                    include './templates/signup.html.php';
                }
                else if (  $view === 'userdefault' ) 
                {
                    //main user view page
                    include './templates/userdefault.html.php';
                }
                else if (  $view === 'read' ) 
                {
                    //user view of detailed address info and update/delete access
                    include './templates/read.html.php';
                }

                else
                {
                    /* Default view for log in or csignup*/
                    include './templates/default.html.php';
                }

                ?>

                <?php 
                //output of success or error messages
                include 'includes/results.html.php'; 
                ?>
              
      </div>
    </div><!-- /.container -->
    </body>
</html>
