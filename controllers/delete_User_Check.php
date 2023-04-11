<?php

    session_start();
    require_once("../models/user_all_model.php");

    if(isset($_REQUEST['delete']))
    {
        $userID = $_REQUEST['userid'];

        $deleted_user = delete_operation_User($userID);

        if($deleted_user)
        {
            header('location: ../views/user_all_List.php?msg=deletesuccess');
        }
        else
        {
            header('location: ../views/user_all_List.php?msg=deletefailed');   
        }
    }
    else
    {
        header('location: ../views/delete_User.php');
    }

?>