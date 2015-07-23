<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <ul>
            <?php
            for ($index = 1; $index <= 10; $index++) 
            {
                echo '<li>'.$index.'</li>';
            }
            ?>
        </ul>
    
        <ul>
            <?php for ($index = 1; $index <= 10; $index++) 
            { ?>
                <li> <?php echo $index; ?> </li>
            <?php } ?>
        </ul>
        
        <ul>
            <?php for ($index = 1; $index <= 10; $index++):?>
                <li> <?php echo $index; ?> </li>
            <?php endfor; ?>
        </ul>
       
    </body>
</html>
