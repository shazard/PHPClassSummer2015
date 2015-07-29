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
                                  
        ?>
        
        
        <form method="post" action="#">
            
            
            Data one <input type="text" value="" name="dataone" />
            <br/>
            Data two <input type="text" value="" name="datatwo" />
            <br/>
            
            <input type="submit" value="Submit" />
            
        </form>
        
        
       
    </body>
</html>
