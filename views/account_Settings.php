<?php

    session_start();

    if(isset($_COOKIE['userLoggedIn']))
    {
?>

<html>
  <head>
    <title> Account Settings </title>
    <link rel="stylesheet" href="../assets/stylesheets/account_Settings_Stylesheet.css">
  </head>

  <body>
    <div id="main-box">
        <h1 id="header">Account Settings</h1>
        <p align="center"><a href="change_Password.php" class="links"> Change Password </a></p>
        <p align="center"><a href="privacy_Policy.php" class="links"> Change Email </a></p>
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
