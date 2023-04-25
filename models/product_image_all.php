<?php

    require_once("../models/db_connection.php");

    #Find Product Image
  

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Fetch Product Image
    function fetch_image_by_product_id($productID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_image_all` WHERE `product_id`= '{$productID}'";
        $result = mysqli_query($connected, $sql); 

        return mysqli_fetch_assoc($result);
    }

    function fetch_image_by_General($productID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_image_all` WHERE `product_id`= '{$productID}'";
        
        return mysqli_query($connected, $sql); 
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #insert Product Image
    function insert_product_img($productID, $productIMG_1, $productIMG_2, $productIMG_3, $productIMG_4, $productIMG_5)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $imgID = setProductIMGCode();
        $connected = setConnection();
        $sql = "INSERT INTO `product_image_all`(`img_id`, `product_id`, `product_img_1`, `product_img_2`, `product_img_3`, `product_img_4`, `product_img_5`, `add_date`, `add_time`) 
        VALUES ('{$imgID}','{$productID}','{$productIMG_1}','{$productIMG_2}','{$productIMG_3}','{$productIMG_4}','{$productIMG_5}','{$date}','{$time}')";

        return mysqli_query($connected, $sql);
    }
?>