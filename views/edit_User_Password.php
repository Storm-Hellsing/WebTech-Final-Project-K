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
        <title>Edit Admin</title>
        <link rel="stylesheet" href="../assets/stylesheets/edit_User_Password_Stylesheet.css">
        <script src="../assets/scripts/edit_User_Password_Script.js"></script>
    </head>

    <body>
        <form method="POST" action="../controllers/edit_User_Password_Check.php" enctype="">
            <input type="hidden" name="userid" id="userid" value="<?php echo($userData['user_id']); ?>">
            <div class="main-box">
                <h2 id="companyname">Goods and Goodies</h2>
                <h2>Force Change Password</h2>
                <div class="form-box">
                    <label for="currentpassword">Current Password:</label><br>
                    <input type="password" name="currentpassword" id="currentpassword" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" id="password" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="retypepassword">Retype Password:</label><br>
                    <input type="password" name="retypepassword" id="retypepassword" value=""/>
                    <br> <br>
                </div>
                <div>
                    <table>
                        <tr>
                            <th>
                                <input type="checkbox" name="show_password" id="show_password" class="check-box" onclick="togglePassword()"/>
                            </th>
                            <th>
                                <label for="show_password">Show Password</label>
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="editbutton">
                    <button type="submit" name="edit" id="button">Edit</button>
                    <a href="user_Admin_List.php" id="button">Cancel</a>
                </div>
            </div>
        </form>

        <?php

            if(isset($_REQUEST['msg']))
            {

        ?>

        <div class="message-box">
            Message:
            <p id="message-box-paragrapgh">
        <?php

            if($_REQUEST['msg'] == 'nullInputs')
            {
                echo("Please fillup all the fileds.");
            }
            elseif($_REQUEST['msg'] == 'wrongcurrentPassword')
            {
                echo("Current Password seems to be wrong. Please try again.");
            }
            elseif($_REQUEST['msg'] == 'invalidPassword')
            {
                echo("1. Passwords should be at least 8 characters long.<br/>
                    2. Should contain atleast one symbol.<br/>
                    3. Should contain at least one number.<br/>
                    4. Password can not contain '|' charcter.");
            }
            elseif($_REQUEST['msg'] == 'passwdMismatch')
            {
                echo("Passwords did not match. Please try again.");
            }
        ?>
            </p>
        </div>

        <?php

            }

        ?>

    </body>
</html>

<?php
    
    }
    else
    {
        header('location: ../views/signIn.php');
    }

?>