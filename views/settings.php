<?php

    session_start();

    if(isset($_COOKIE['userLoggedIn']))
    {
?>

<html>
  <head>
    <title> Settings </title>
    <link rel="stylesheet" href="../assets/stylesheets/settings_Stylesheet.css">
  </head>

  <body>
    <div id="main-box">
        <h1 id="header">Settings</h1>
        <p><a href="account_Settings.php" class="links"> Account Setting </a></p>
        <p><a href="privacy_Policy.php" class="links"> Privacy Policy </a></p>
        <p><a href="terms_Conditions.php" class="links"> Terms & Conditions </a></p>
        <div id="button-container">
        <a href="logout.php" id="button">Logout</a>
        </div>
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
