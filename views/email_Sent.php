<?php

    session_start();

    if(isset($_COOKIE['userLoggedIn']))
    {
        $userID = $_COOKIE['userLoggedIn'];
    
?>

<html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="../assets/stylesheets/email_Sent_Stylesheet.css">
    </head>

    <body>
            <div id="main-box">
                <h1>A confirmation has been sent to your prefered email. Please check your inbox.</h1>
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