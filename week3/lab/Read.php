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
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';

        /*
         * get and hold a database connection 
         * into the $db variable
         */
        $db = getDatabase();

        /*
         * create a variable to hold the database
         * SQL statement
         */
       
        
        $id = filter_input(INPUT_GET, 'id'); 
            
        $stmt = $db->prepare("SELECT * FROM corps where id = :id");
        
        $binds = array(
        ":id" => $id
            );

        /*
         * We execute the statement and make sure we
         * got some results back.
         */
       
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        

        <br><br>
        
        <table>
            <thead>
                <tr>
                    <th>Corporation</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <?php
            /*
             * Use a for each loop to go through the
             * associative array. $results is a multi 
             * dimensional array. Arrays with arrays.
             * 
             * So we loop through each result to get back
             * an array with values
             * 
             * feel free to 
             * <?php echo print_r($results); ?>
             * to see how the array is structured
             */            
            ?>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>  
                    <td><?php echo $row['incorp_dt']; ?></td>  
                    <td><?php echo $row['email']; ?></td>  
                    <td><?php echo $row['zipcode']; ?></td>  
                    <td><?php echo $row['owner']; ?></td>  
                    <td><?php echo $row['phone']; ?></td>  
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="view-action.php">Return To View</a>
    </body>
</html>
