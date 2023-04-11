<?php

    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_REQUEST['edit']))
    {
        $userID = $_REQUEST['userid'];
        $currentPassword = $_REQUEST['currentpassword'];
        $newPassword = $_REQUEST['password'];
        $retypePassword = $_REQUEST['retypepassword'];

        #validations
        $validPassword = validatePassword($newPassword);

        #sql Query
        $found_Current_Password = find_Current_Password($userID, $currentPassword);

        if($currentPassword == "" && $newPassword == "" && $retypePassword == "")
        {
            header('location: ../views/edit_User_Password.php?msg=nullInputs');
        }
        elseif($found_Current_Password === false) 
        {
            header('location: ../views/edit_User_Password.php?msg=wrongcurrentPassword');
        }
        elseif($validPassword == 0)
        {
            header('location: ../views/edit_User_Password.php?msg=invalidPassword');
        }
        elseif($newPassword != $retypePassword)
        {
            header('location: ../views/edit_User_Password.php?msg=passwdMismatch');
        }
        else
        {
            #SQLQuerry
            $updated = edit_opertation_Password($newPassword, $userID);

            if($updated)
            {
                header('location: ../views/user_all_List.php?msg=editSuccess');
            }
            else
            {
                header('location: ../views/user_all_List.php?msg=editfailed');
            }
        }

    }
    else
    {
        header('location: ../views/edit_User_Password.php');
    }

?>