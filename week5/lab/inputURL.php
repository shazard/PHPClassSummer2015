<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
        /*
         * include the data base connect file
         * and helper functions
         */
            include './functions/dbconnect.php';
            include './functions/until.php';        
            
            $db = dbconnect();

            $stmt = $db->prepare("SELECT * FROM sites ORDER BY site_id ASC");
            $allSites = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $allSites = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            $results = '';
            $linkValue = "";

            if (isPostRequest()) 
                {
                $site = filter_input(INPUT_POST, 'site');
                    if ( filter_var($site, FILTER_VALIDATE_URL) !== false  )
                    { 
                        $db = dbconnect();
                        $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = now()");                    

                        $binds = array(
                        ":site" => $site                        
                        );

                        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                        {
                            $results = 'Data Added';
                        }
                    }                    
                    else
                    {
                        $results = "URL is not valid";
                        $linkValue = $site;                        
                    }
            }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Enter Website URL <input type="text" value="<?php echo $linkValue ?>" name="site" />
            <br />
            <input type="submit"  value="Submit" />
            <br>
            <a href="inputURL.php">Restart</a>
    </body>
</html>
