<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Address Book Manager</title>
        <link href="" rel="stylesheet">
    </head>
    <body>
        <?php
        // put your code here
        
        $view = filter_input(INPUT_GET, 'view');
        
        
        include './templates/links.html.php';
        
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
    </body>
</html>
