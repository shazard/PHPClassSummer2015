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
            include './dbconn.php';
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
            $stmt = $db->prepare("SELECT * FROM actors");

            /*
             * We execute the statement and make sure we
             * got some results back.
             */
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Height</th>
                </tr>
            </thead>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>            
                    <td><?php echo $row['dob']; ?></td>            
                    <td><?php echo $row['height']; ?></td>            
                </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
