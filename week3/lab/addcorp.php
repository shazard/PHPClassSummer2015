<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>Corporation Updates</title>
    </head>
    <body>
        
        <h1>Add New Corporation</h1>
        <?php
        
         /*
         * include the data base connect file
         * and helper functions
         */
            include './dbconnect.php';
            include './functions.php';
            
            $results = '';
            /*
            * connect to database
            * 
            */
            if (isPostRequest()) 
                {
                    $db = getDatabase();

                    $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");                    $corp = filter_input(INPUT_POST, 'corp');                    
                    $email = filter_input(INPUT_POST, 'email');
                    $zipcode = filter_input(INPUT_POST, 'zipcode');
                    $owner = filter_input(INPUT_POST, 'owner');
                    $phone = filter_input(INPUT_POST, 'phone');

                    $binds = array(
                        ":corp" => $corp,                        
                        ":email" => $email,
                        ":zipcode" => $zipcode,
                        ":owner" => $owner,
                        ":phone" => $phone
                    );

                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                    {
                        $results = 'Data Added';
                    }
            }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Corporation Name <input type="text" value="" name="corp" />

            <!-- Date of Incorporation <input type="date" value="" name="incorpDate" />  -->
            <br />
            Email <input type="text" value="" name="email" />
            <br />
            Zip Code <input type="text" value="" name="zipcode" />
            <br />
            Owner <input type="text" value="" name="owner" />
            <br />
            Phone <input type="text" value="" name="phone" />
            <br />

            <input type="submit" class="btn btn-primary" value="Submit" />
            
            <a href="view-action.php">Return To View</a>
        </form>
    </body>
</html>
