<?php

    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_SESSION['useremail']) && isset($_SESSION['userid']))
    {
        $userID = $_SESSION['userid'];
        $email = $_SESSION['useremail'];
    
        $updated = edit_opertation_Email($email, $userID);
    
        if($updated)
        {
?>

<html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="../assets/stylesheets/email_Changed_Stylesheet.css">
    </head>

    <body>
            <div id="main-box">
                <h1>Your email has been changed.</h1>
                <p id="text">Your have been logged out from your account. Please consider <a href="signIn.php" id="link"> Signing In </a>agian.</p>
            </div>
    </body>
</html>

<?php
            session_destroy();
            setcookie('userLoggedIn', $userID, time()  - 1, '/');

        }
        else
        {
            echo("Message:<br/>
            Unable to change the password. Please try again.");
        }
    }
    else
    {
        header('location: ../views/signIn.php');
    }   

?>


