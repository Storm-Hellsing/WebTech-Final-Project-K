<?php

    session_start();
    require_once("../models/user_image_all_model.php");

    if(isset($_COOKIE['userLoggedIn']))
    {
      $userID = $_COOKIE['userLoggedIn'];

      $imgData = fetch_image_by_user_id($userID);
?>

<html>
  <head>
    <title> Account Settings </title>
    <link rel="stylesheet" href="../assets/stylesheets/account_Settings_Stylesheet.css">
    <script src="../assets/scripts/account_Settings_Script.js"></script>
  </head>

  <body>
    <input type="hidden" name="userid" id="userid" value="<?php echo($userID); ?>">
    <div id="main-box">
        <h1 id="header">Account Settings</h1>
        <p><a href="change_Password.php" class="links"> Change Password </a></p>
        <p><a href="change_Email.php" class="links"> Change Email </a></p>
        <div id="preview-container">
          <?php

            if($imgData && file_exists("../assets/server_uploads/user_uploads/profile/".$userID."/".$imgData['img_name']))
            {
              

          ?>
          
            <img src="../assets/server_uploads/user_uploads/profile/<?php echo($userID); ?>/<?php echo($imgData['img_name']); ?>" id="pro-image"/>

          <?php

            }
            else
            {

          ?>   

            <img src="../assets/graphics/user_icon.png" id="pro-image"/>

          <?php

            }

          ?>   
        </div>
        <button name="add" id="add" onclick="addImage_AJAX(); storeFile();">Upload</button>
        <input type="file" name="image" id="image" accept="images/*" onchange="previewImages(event)">
    </div>
    <div id="message-box">
                <table>
                    <tr>
                        <td><p id="message-text"></p></td>
                    </tr>
                </table>
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
