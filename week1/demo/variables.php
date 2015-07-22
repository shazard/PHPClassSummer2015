<!DOCTYPE html>
<?php
    $myvar = 'hello';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php  echo 'My page Title'.$myvar;   ?></title>
    </head>
    <body>
        <?php
        
            $randNumber = rand(1,10);
            
            echo 'my number is '.$randNumber;
              
        
        ?>
    </body>
</html>
