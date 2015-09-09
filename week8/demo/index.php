<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
