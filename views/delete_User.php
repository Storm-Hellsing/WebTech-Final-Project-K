<?php

    session_start();
    require_once("../models/user_all_model.php");

    if(isset($_COOKIE['userLoggedIn']))
    {   
        $userID = $_REQUEST['userid'];
        $userData = fetch_Data_ByID($userID);
?>


<html>
    <head>
        <title>
            Delete User
        </title>
        <link rel="stylesheet" href="../assets/stylesheets/delete_User_Stylesheet.css">
        <script src="../assets/scripts/delete_User_Script.js"></script>
    </head>

    <body>
        <div id="main-box">
            <input type="hidden" name="userid" id="userid" value="<?php echo($userData['user_id']) ?>">
            <h1 id="header">Delete User</h1>
                <table id="table">
                    <tr>
                        <th align="left">User ID: </th>
                        <th align="right"><?php echo($userData['user_id']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">User Name: </th>
                        <th align="right"><?php echo($userData['user_name']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Email: </th>
                        <th align="right"><?php echo($userData['user_email']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Mobile: </th>
                        <th align="right"><?php echo isset($userData['user_mobile']) ? $userData['user_mobile'] : "Not Provided"; ?></th>
                    </tr>
                    <tr>
                        <th align="left">Joining Date: </th>
                        <th align="right"><?php echo($userData['joining_date']); ?></th>
                    </tr>
                </table>
                <hr>

                <div id="delete-button">
                <button name="delete" id="delete" onclick="delete_AJAX()">Delete</button>
                </div>

                <a href="user_all_List.php" id="view-users">View Users</a>

        </div>

        <div id="message-box">
            <p id="message-text"></p>
        </div>
    </body>
</html>

<?php

    }
    else
    {
        header('location: ../views/signIn.php');
    }

?>