<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Address Book Manager</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom bootstrap styles for this template -->
        <link href="css/cover.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once 'includes/session-start.req-inc.php';
            
            include_once 'functions/dbconnect.php';
            include_once 'functions/login-function.php';
            include_once './functions/signupfunctions.php';
            include_once 'functions/until.php'; 
            
                               
                $view = filter_input(INPUT_GET, 'view');
                if ( isPostRequest() ) {

                        $email = filter_input(INPUT_POST, 'email');
                        $password = filter_input(INPUT_POST, 'pass');

                        if ( isValidUser($email, $password) ) {
                            $_SESSION['isValidUser'] = true;
                            header('Location: index.php?view=userdefault');

                        } else {
                            $results = 'Invalid Login. Sorry, please try again';
                        }
                    }
                    

        ?>
        
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Address Book Manager</h3>
              <nav>
            <?php            
                if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) 
                {
                    include './templates/links.html.php';
                }            
                ?>                
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <?php       
                //$view = filter_input(INPUT_GET, 'view');

                                
                
                if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true ) 
                {
                    //include 'includes/loginform.html.php';
                }
                

                if ( $view === 'add' ) 
                {
                    include './templates/add.html.php';
                } 
                else if (  $view === 'update' ) 
                {
                    include './templates/update.html.php';
                }
                else if (  $view === 'delete' ) 
                {
                    include './templates/delete.html.php';
                }
                else if (  $view === 'signup' ) 
                {
                    include './templates/signup.html.php';
                }
                else if (  $view === 'userdefault' ) 
                {
                    include './templates/userdefault.html.php';
                }

                else
                {
                    /* Default view for log in or create user*/
                    include './templates/default.html.php';
                }

                ?>

                <?php include 'includes/results.html.php'; ?>
              
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p></p>
            </div>
          </div>

        </div>

      </div>

    </div>
    </body>
</html>
