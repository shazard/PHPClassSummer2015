<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include './functions/dbconnect.php';
            include './functions/until.php';
            
            
                $db = dbconnect();

                $stmt = $db->prepare("SELECT * FROM sites");
                $sites = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                
                $stmt2 = $db->prepare("SELECT * FROM sitelinks");
                $siteLinks = array();
                
                var_dump($sites);
                echo "<br>";
                var_dump($sitelinks);
                echo "<br>";
                
                
                if ($stmt2->execute() && $stmt2->rowCount() > 0) {
                    $siteLinks = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                }
                
                if ( isPostRequest() ) {
                    
                    
                    $stmt3 = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                    $site_id = filter_input(INPUT_POST, 'site_id');
                    $binds = array(
                    ":site_id" => $site_id
                    );

                    if ($stmt3->execute($binds) && $stmt3->rowCount() > 0) {
                        $results = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                    }
                    
                    
                    
                }
            
        ?>
        
        <form method="post" action="#">
 
            <select name="site_id">
            <?php foreach ($sites as $row): ?>
                <option value="<?php echo $row['site_id']; ?>"><?php echo $row['site']; ?></option>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Submit" />
        </form>
        
        
        
        
        <?php if( isset($results) ): ?>
 
            <h2>Results found <?php echo count($results); ?></h2>
            <table border="1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['sites']; ?></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif;

        ?>

        
        
        
    </body>
</html>
