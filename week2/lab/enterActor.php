<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            
            $results = '';
            /*
            * connect to database
            * 
            */
            if (isPostRequest()) 
                {
                    $db = getDatabase();

                    $stmt = $db->prepare("INSERT INTO actors SET firstName = :firstName, lastName = :lastName, dob = :dob, height = :height");

                    $firstName = filter_input(INPUT_POST, 'firstName');
                    $lastName = filter_input(INPUT_POST, 'lastName');
                    $dob = filter_input(INPUT_POST, 'dob');
                    $height = filter_input(INPUT_POST, 'height');

                    $binds = array(
                        ":firstName" => $firstName,
                        ":lastName" => $lastName,
                        ":dob" => $dob,
                        ":height" => $height
                    );

                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
                    {
                        $results = 'Data Added';
                    }
            }
        ?>


        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            First Name <input type="text" value="" name="firstName" />
            <br />
            Last Name <input type="text" value="" name="lastName" />
            <br />
            Date of Birth <input type="date" value="" name="dob" />
            <br />
            Height <input type="text" value="" name="height" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
