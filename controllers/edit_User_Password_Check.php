<?php

    require_once("../models/validations.php");
    require_once("../models/db_connection.php");
    session_start();

    if(isset($_REQUEST['edit']))
    {
        $userID = $_REQUEST['userid'];
        $currentPassword = $_REQUEST['currentpassword'];
        $NewPassword = $_REQUEST['password'];
        $retypePassword = $_REQUEST['retypepassword'];

        #validations
        $validPassword = validatePassword($NewPassword);

        #sql Query
        $sql = "SELECT * FROM `user_all` WHERE `user_id` = '{$userID}' AND `user_password` = '{$currentPassword}'";
        $result = sqlReadQuery($sql);

        if($currentPassword == "" && $NewPassword == "" && $retypePassword == "")
        {
            header('location: ../views/edit_User_Password.php?msg=nullInputs');
        }
        elseif($result === false) 
        {
            header('location: ../views/edit_User_Password.php?msg=wrongcurrentPassword');
        }
        elseif($validPassword == 0)
        {
            header('location: ../views/edit_User_Password.php?msg=invalidPassword');
        }
        elseif($NewPassword != $retypePassword)
        {
            header('location: ../views/edit_User_Password.php?msg=passwdMismatch');
        }
        else
        {
            #SQLQuerry
            $sql = "UPDATE `user_all` 
                    SET `user_password`='{$NewPassword}' 
                    WHERE `user_id` = '{$userID}'";
            $result = sqlWriteQuery($sql);

            if($result)
            {
                header('location: ../views/user_Admin_List.php?msg=editSuccess');
            }
            else
            {
                header('location: ../views/user_Admin_List.php?msg=editfailed');
            }
        }

    }
    else
    {
        header('location: ../views/edit_User_Password.php');
    }

?>