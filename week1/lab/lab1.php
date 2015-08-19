<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <table>
            <?php 
            //begin for loop to create table
                for($tr = 1; $tr <= 10; $tr++):?>
                <tr> 
                    <?php for($td = 1; $td <= 10; $td++):?>
                     
                    <?php 
                    //get a random hex number to format the background color of each box
                    $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF))); ?>
                    
                    <td style = "background-color: <?php echo $randColor; ?>;">    
                            <?php echo $randColor; ?> 
                            <br>
                            <span style="color:#ffffff;">
                            <?php echo $randColor; ?>
                            </span>
                    </td>
                    
                    <?php endfor; ?>                
                </tr>
            <?php endfor; ?>
        </table>
        
        
        
        
        
    </body>
</html>
