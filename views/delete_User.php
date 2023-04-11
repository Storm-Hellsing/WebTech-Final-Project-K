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
    </head>

    <body>
        <form method="POST" action="../controllers/delete_User_Check.php" enctype="">
            <input type="hidden" name="userid" id="userid" value="<?php echo($userData['user_id']) ?>">
            <fieldset>
                <legend>Delete Products</legend>
                <label for="userid">User ID: <?php echo($userData['user_id']); ?></label> <br/>
                <label for="username">User Name: <?php echo($userData['user_name']); ?></label> <br/>
                <label for="email">Email: <?php echo($userData['user_email']); ?></label> <br/>
                <label for="mobile">Mobile: <?php echo isset($userData['user_mobile']) ? $userData['user_mobile'] : "Not Provided"; ?></label> <br/>
                <label for="joiningdate">Joining Date: <?php echo($userData['joining_date']); ?></label> <br/>
                <hr>
                <input type="submit" name="delete" id="delete" value="Delete"/>
                <br/>
            </fieldset>

            <br/><br/>

            <h3 align="center"><a href="user_all_List.php">View User List</a></h3>

        </form>
    </body>
</html>

<?php

    }
    else
    {
        header('location: ../views/user_all_List.php');
    }

?>