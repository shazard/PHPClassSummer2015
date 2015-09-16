<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
//Create a Sites Lookup page (20 points)
//
//X   Have a drop down of saved sites.
//X  Once a site is selected query the sitelinks based on the site_id.
//X   Display the results. 
//X  Add a popup link to each site.  Use the attribute target="popup" in the link tag.
//X   Above the table display the site selected with the date and time they were retrieved along with the amount of results found.
//X  Make sure the date format is displayed as (mm/dd/yyyy).
//X  Make sure the last selection is selected in the drop down.
//        
        
        
        
        
        
        
        
            include './functions/dbconnect.php';
            include './functions/until.php';
            
            
                $db = dbconnect();

                $stmt = $db->prepare("SELECT * FROM sites");
                $sites = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) 
                {
                    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($sites);
                }
                  
//                $stmt2 = $db->prepare("SELECT * FROM sitelinks");
//                $siteLinks = array();
//                            
//                
//                if ($stmt2->execute() && $stmt2->rowCount() > 0) 
//                {
//                    $siteLinks = $stmt2->fetchAll(PDO::FETCH_ASSOC);
//                }
//                
//                var_dump($sites);
//                echo "<br><br><br>";
//                var_dump($siteLinks);
//                echo "<br>";
               
                if ( isPostRequest() ) 
                {
                    $stmt3 = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                    $site_id = filter_input(INPUT_POST, 'site_id');
                    $siteForDropdown = $site_id;
                    $binds = array(
                    ":site_id" => $site_id
                    );

                    if ($stmt3->execute($binds) && $stmt3->rowCount() > 0) 
                    {
                    
                        $results = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                        $displaySite = $sites[$site_id]["site"];
                        //mm/dd/yyyy
                        //$displayDate = $sites[$site_id-1]["date"];
                        $displayDate = date("m/d/Y", strtotime($sites[$site_id]["date"]));

                //var_dump($results);
                echo "<br>";
                    }  
                }
            
            
        ?>
        
        <form method="post" action="#">
 
            <select name="site_id">
            <?php foreach ($sites as $row): ?>
                <option value="<?php echo $row["site_id"]; ?>" <?php if (isset($siteForDropdown) && $row["site_id"] == $siteForDropdown) echo "selected";?>><?php echo $row["site"]; ?></option>
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Submit" />
        </form>
        <a href="searchsites.php">Try Again</a>
        
        
        
        
        <?php if( isset($results) ): ?>
 
        
        <h3>Site: <?php echo $displaySite; ?></h3>
        <h3>Added: <?php echo $displayDate; ?></h3>
            <h4>Results found <?php echo count($results); ?></h4>
            <table border="1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><a href="<?php echo $row["link"]; ?>" target="<?php echo $row["link"]; ?>"</a><?php echo $row["link"]; ?></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>

        
        
        
    </body>
</html>