<?php

    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_REQUEST['reset']))
    {
        $userData = $_REQUEST['userData'];
        $credentials = json_decode($userData);

        $userID = $credentials->userid;
        $newPassword = $credentials->password;
        $retypePassword = $credentials->retypepassword;

        #validations
        $validPassword = validatePassword($newPassword);

        if($newPassword == "" || $retypePassword == "")
        {
            echo("Message:<br/><br/>
            Please Fill up all the fields.");
        }
        elseif($validPassword == 0)
        {
            echo("<u>Password Fromat:</u> <br/> <br/>
            <ol>
                <li>Passwords should be at least 8 characters long.</li>
                <li>Should contain atleast one symbol.</li>
                <li>Should contain at least one number.</li>
                <li>Password can not contain '|' charcter.</li>
            </ol>");
        }
        elseif($newPassword != $retypePassword)
        {
            echo("Message:<br/><br/>
            The passwords mismatched.");
        }
        else
        {
            #SQLQuerry
            $updated = edit_opertation_Password($newPassword, $userID);

            if($updated)
            {
                session_destroy();
                echo("Password has been changed.");
            }
            else
            {
                echo("Message:<br/><br/>
                Unable to change the password. Please try again.");
            }
        }

    }
    else
    {
        header('location: ../views/edit_User_Password.php');
    }

?>