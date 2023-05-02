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
        <title>Force Change Password</title>
        <link rel="stylesheet" href="../assets/stylesheets/edit_User_Password_Stylesheet.css">
        <script src="../assets/scripts/edit_User_Password_Script.js"></script>
    </head>

    <body>
            <input type="hidden" name="userid" id="userid" value="<?php echo($userData['user_id']); ?>">
            <div id="main-box">
                <h2 id="companyname">Goods and Goodies</h2>
                <h2>Force Change Password</h2>
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
                <div id="editbutton">
                    <button name="edit" id="button" onclick="edit_AJAX()">Edit</button>
                </div>
            </div>

            <div id="message-box">
                <table>
                    <tr>
                        <td><p id="message-text"></p></td>
                    </tr>
                </table>
            </div>

            <div id="message-box-change-success">
                <table>
                    <tr>
                        <td><p id="success-text"></p></td>
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