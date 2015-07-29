<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include './dbconnect.php';
            include './functions.php';
            
            $db = getDatabase();
            
            $stmt = $db->prepare("SELECT * FROM test");
            $results = array();            
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);                
            }
            
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                </tr>
            </thead>
        <?php foreach($results as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['dataone']; ?></td>
                <td><?php echo $row['datatwo']; ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        
    </body>
</html>
