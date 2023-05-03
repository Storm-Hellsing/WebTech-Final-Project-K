<?php

    require_once("../models/db_connection.php");
    require_once("../models/validations.php");

    #Find Product Image
  

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Fetch Product Image
    function fetch_image_by_user_id($userID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `user_image_all` WHERE `user_id`= '{$userID}'";
        $result = mysqli_query($connected, $sql); 

        return mysqli_fetch_assoc($result);
    }

    // function fetch_image_by_General($productID)
    // {
    //     $connected = setConnection();
    //     $sql = "SELECT * FROM `user_image_all` WHERE `user_id`= '{$userID}'";
        
    //     return mysqli_query($connected, $sql); 
    // }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #insert Product Image
    function insert_user_img($userID, $imgName)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $imgID = setProductIMGCode();
        $connected = setConnection();
        $sql = "UPDATE `user_image_all` 
                SET `image_id`='{$imgID}',
                `user_id`='{$userID}',
                `img_name`='{$imgName}',
                `add_date`='{$date}',
                `add_time`='{$time}'";

        return mysqli_query($connected, $sql);
    }
?>