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
            
            //get list of sites to compare with site entered
            $stmt = $db->prepare("SELECT * FROM sites ORDER BY site_id ASC");
            $allSites = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $allSites = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            //var_dump($allSites);
            /*
             * variables  to update results message, contents of text box 
             * and an array to hold the links pulld from the entered site through curl
             */
            
            $results = '';
            $linkValue = "";
            $linksOnSite = array();
            
            /*
             * after submit, check if website is valid
             * then check if website has curl output
             * then add the site to the sites database
             * update message with success or failure
             */
            if (isPostRequest()) 
                {
                $site = filter_input(INPUT_POST, 'site');
                    if ( filter_var($site, FILTER_VALIDATE_URL) !== false  )
                    {                        
                        if (in_array($site, $allSites)== false)
                        {                        
                            if (sendToCurl($site))
                            {
                                $linksOnSite = filterRegEx(sendToCurl($site));

                                $db = dbconnect();
                                $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = now()");
                                $binds = array(
                                ":site" => $site                        
                                );

                                if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                                {
                                    $site_id = $db->lastInsertId();
                                    
                                    $stmt2 = $db->prepare("INSERT INTO sitelinks SET site_id = :site_id, link = :link");

                                    foreach ($linksOnSite as $link) {
                                        $binds = array( ":link" => $link, ":site_id" => $site_id); 
                                        $stmt2->execute($binds);
                                    } 

                                    $results = 'Data Added';
                                    
                                    
                                    
                                }
                            }
                            else
                            {
                            $results = "Unable to get links on site";
                            $linkValue = $site;                        
                            }
                        }
                        else
                        {
                            $results = "Site has already been entered";
                            $linkValue = $site;                        
                        }
                    }                    
                    else
                    {
                        $results = "URL is not valid";
                        $linkValue = $site;                        
                    }
            }

            //var_dump($linksOnSite);

        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Enter Website URL <input type="text" value="<?php echo $linkValue ?>" name="site" />
            <br />
            <input type="submit"  value="Submit" />
            <br>
        </form>
            <a href="inputURL.php">Restart</a>
    </body>
</html>
