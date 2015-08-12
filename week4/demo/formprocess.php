<!DOCTYPE html>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>My Forms</h1>
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'Submit1'){
            echo 'submitted form 1';

        }
        
        include './forms/form1.php';
        include './forms/form2.php';
        ?>
    </body>
</html>
