<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

    

?>

<html>
    <head>
        <title>Inventory</title>
    </head>

    <body>
        <form method="POST" action="" enctype="multipart/form-data"></form>
        <div class="main-box">
            <h1>Inventory</h1>
            <a href="" class="menu">Add Product to Inventory</a>
            <br/> <br/>
            <label for="productype"></label>
            <input type="text">
        </div>
    </body>
</html>

<?php

    }

?>