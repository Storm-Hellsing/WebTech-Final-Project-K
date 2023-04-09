<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

?>

<html>
    <head>
        <title>Operations</title>
    </head>

    <body>
        <form method="POST" action="" enctype="multipart/form-data"></form>
        <div class="main-box">
            <h1>Operations</h1>
            <a href="add_Product_Type.php" class="menu">Add Product Types</a>
        </div>
    </body>
</html>

<?php

    }

?>