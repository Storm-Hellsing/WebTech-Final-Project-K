<?php

    session_start();
    require_once("../models/sql_connection.php");

    if(isset($_REQUEST['remove']))
    {
        $userID = $_REQUEST['user_id'];

        $sql = "DELETE FROM `user_all` WHERE `user_id` = '{$userID}'";
        $result = sqlWriteQuery($sql);
        
        if($result)
        {
            header('location: ../views/user_all_List.php?msg=userRemoved');
        }
        else
        {
            header('loaction: ../views/user_all_List.php?msg=opFalied');
        }
    }
    else
    {
        header('loaction: ../views/user_all_List.php');
    }

?>