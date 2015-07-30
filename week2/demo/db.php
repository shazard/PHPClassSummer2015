<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $config = array(
            'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassSummer2015', 
            'DB_USER' => 'php', 
            'DB_PASSWORD' => 'summer15'
            );
        
               
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        
        $stmt = $db->prepare("SELECT * FROM test");
        
        //$phoneID = filter_input(INPUT_POST, 'phoneid');
        
        //$binds = array( ":phonetypeid" => $phoneID );
        
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             var_dump($results);            
         }
        
        ?>
    </body>
</html>
