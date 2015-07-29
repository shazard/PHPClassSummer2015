<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include './dbconnect.php';
            
            $db = getDatabase();
            
            $stmt = $db->prepare("INSERT INTO test SET dataone = :dataone, datatwo = :datatwo");
        
            $dataone = filter_input(INPUT_POST, '');
            $datatwo = filter_input(INPUT_POST, '');
        
            $binds = array( 
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
                    );
            
            $results = array();
            if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);                       
            }
            
            
        ?>
    </body>
</html>
