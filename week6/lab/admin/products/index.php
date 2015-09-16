<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once '../../includes/session-start.req-inc.php';
            require_once '../../includes/access-required.html.php';
        ?>
        <h1>Product Administration</h1>
        <hr>
        <p><a href="create.php" class="btn btn-default">Create</a> Create new products</p>
        <p><a href="view.php" class="btn btn-default">View & Edit</a> Manage existing products</p>
        <br>
        <a href="../index.php" class="btn btn-default">Return to Administration Page</a>
        <a href="../../index.php" class="btn btn-default">Return Home</a><br><br> 
    </body>
</html>
