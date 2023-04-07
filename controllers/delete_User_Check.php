<?php

    session_start();
    require_once("../models/db_connection.php");

    if(isset($_REQUEST['delete']))
    {
        $userID = $_REQUEST['userid'];
        $sql = "DELETE FROM `user_all` WHERE `user_id` = '{$userID}'";
        $result = sqlWriteQuery($sql);

        if($result)
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