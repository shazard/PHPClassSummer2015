<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
       
    <?php

        include_once './functions/dbconnect.php';
        include_once './functions/dbData.php';
        include_once './functions/util.php';

        include './includes/getSortedForm.php';
        include './includes/getSearchForm.php';

        $results = getAllDatabaseData();

        $action = filter_input(INPUT_GET, 'action');
        
        if ($action === 'sort')
        {
            $column = filter_input(INPUT_GET, 'sortBy');
            $order = filter_input(INPUT_GET, 'sortOrder'); //ASC or DESC
            $results = sortDatabase($column, $order);
        }

        if ($action === 'search')
        {
            $column = filter_input(INPUT_GET, 'searchColumn');
            $userSearch = filter_input(INPUT_GET, 'userSearch');
            $results = searchDatabase($column, $userSearch);
            $columnCount = count($results);
            if ($columnCount > 0)
            {
                echo "<br><h3>Total Results: " . $columnCount . "</h3>";
            }
            else
            {
                echo "<h3>No results found</h3>";
            }
        }

        ?>
        <h3>

            <a href="view.php">Search Again</a>
            
        </h3>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation Name</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td> 
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['zipcode']; ?></td> 
                    <td><?php echo $row['owner']; ?></td> 
                    <td><?php echo $row['phone']; ?></td> 
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
           
    </body>
</html>