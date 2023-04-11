<?php

    session_start();
    require_once("../models/db_connection.php");

    if(isset($_COOKIE['userLoggedIn']))
    {
        $userID =  $_COOKIE['userLoggedIn'];

        $sql = "SELECT * FROM `user_all` WHERE `user_id` = '{$userID}'";
        $result = sqlReadQuery($sql);

        if($result == 1)
        {   
            $result = getTableData($sql);
            $userData = mysqli_fetch_assoc($result);
        

?>

<html>
    <head>
        <title>Home Admin</title>
        <link rel="stylesheet" href="../stylesheets/homePage_Admin.css">
    </head>

    <body>
        <div class="main-box">
            <h1>Goods and Goodies</h1> <br/>
            <h3 id="user-welcome">Welcome, <?php echo($userData['user_name']); ?></h3>
            <a href="operations.php" target="_blank" class="menu">Operations</a>
            <a href="" target="_blank" class="menu">My Orders</a>
            <a href="" target="_blank" class="menu">My Cart</a>
            <a href="user_all_List.php" target="_blank" class="menu">View Users</a>
            <a href="" target="_blank" class="menu">Settings</a>
            <a href="" target="_blank" class="menu">My profile</a>
            <a href="logout.php" class="menu">Logout</a>
        </div>
    </body>
</html>

<?php
        }
        else
        {
            header('location: ../views/signIn.php?msg=userDoesNotExsist');
        }

    }
    else
    {
        header('location: ../views/signIn.php');
    }

?>