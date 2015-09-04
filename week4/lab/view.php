<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>Corporation Search</title>

    </head>
    <body>
    
        
        <h1>Corporation Search</h1>
    <?php
        
        include_once './functions/dbconnect.php';
        include_once './functions/dbData.php';
        include_once './functions/util.php';

        //include form for sorting
        include './includes/getSortedForm.php';
    ?>
        <br>
    <?php
        //include form for searching
        include './includes/getSearchForm.php';

        $results = getAllDatabaseData();

        $action = filter_input(INPUT_GET, 'action');
        
        //check submit button used to determine which search boxes to grab and use for search
        if ($action === 'sort')
        {
            $column = filter_input(INPUT_GET, 'sortBy');
            $order = filter_input(INPUT_GET, 'sortOrder'); //ASC or DESC
            $results = sortDatabase($column, $order);
        }

        if ($action === 'search') :
        
            $column = filter_input(INPUT_GET, 'searchColumn');
            $userSearch = filter_input(INPUT_GET, 'userSearch');
            $results = searchDatabase($column, $userSearch);
            $columnCount = count($results);
            if ($columnCount > 0) : ?>
            
                <br><h3><?php echo "Total Results: " . $columnCount; ?></h3>
            
            <?php else :
            
                echo "<h3>No results found</h3>"; endif;?>
                
         <?php endif; ?>  
        

        
        <h3>

            <a href="view.php">Search Again</a>
            
        </h3>
        <br>
       
        
        <table class="table">
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
                    <td><?php echo date("m/d/Y", strtotime($row['incorp_dt'])); ?></td> 
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['zipcode']; ?></td> 
                    <td><?php echo $row['owner']; ?></td> 
                    <td><?php echo $row['phone']; ?></td> 
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>

    </body>
</html>