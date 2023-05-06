<?php

    require_once("../models/db_connection.php");
    require_once("../models/validations.php");

    #Find Product Image
    function find_wish_list_by_user_id($userID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `wish_list_all` WHERE `user_id` = '{$userID}'";
        $result = mysqli_query($connected, $sql); 

        return mysqli_num_rows($result);
    }
  

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Fetch Product Image
    function fetch_wish_list_by_wish_id($productID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_image_all` WHERE `product_id`= '{$productID}'";
        $result = mysqli_query($connected, $sql); 

        return mysqli_fetch_assoc($result);
    }

    function fetch_wish_list_by_user_id($userID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `wish_list_all` WHERE `user_id` = '{$userID}'";
        
        return mysqli_query($connected, $sql); 
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #insert Product Image
    function insert_wish_list($userID, $productID, $merchantName, $productName, $productPrice, $productDescription)
    {

        $wishID = setWishID();
        $connected = setConnection();
        $sql = "INSERT INTO `wish_list_all`(`wish_list_id`, `user_id`, `product_id`, `merchant_name`, `product_name`, `product_price`, `product_description`) 
        VALUES ('{$wishID}','{$userID}','{$productID}','{$merchantName}','{$productName}','{$productPrice}','{$productDescription}')";

        return mysqli_query($connected, $sql);
    }
?>