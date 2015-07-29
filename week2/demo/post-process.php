<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
        
         $dataoneVal = filter_input(INPUT_POST, 'dataone');
         $datatwoVal = filter_input(INPUT_POST, 'datatwo');
         echo $dataoneVal;
         echo $datatwoVal;
                                  
        ?>
        
    </body>
</html>
