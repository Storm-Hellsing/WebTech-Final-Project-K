<?php

    require_once("../models/db_connection.php");
    require_once("../models/validations.php");

    #Find Product Type
    function find_product_all_general()
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` ORDER BY `product_name` ASC";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function find_product_by_product_name($productName)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` WHERE `product_name`= '{$productName}' ORDER BY `product_name` ASC";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function find_product_by_product_id($productID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` WHERE `product_id`= '{$productID}' ORDER BY `product_name` ASC";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function find_product_by_merchant_id($merchantID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` WHERE `merchant_id`= '{$merchantID}' ORDER BY `product_name` ASC";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function find_product_by_productType($produtType)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` WHERE `product_type`= '{$produtType}' ORDER BY `product_name` ASC";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Fetch Product Type
    function fetch_product_all_general()
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` ORDER BY `product_name` ASC";

        return mysqli_query($connected, $sql);
    }

    function fetch_product_by_product_id($productID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` WHERE `product_id`= '{$productID}' ORDER BY `product_name` ASC";
        $result = mysqli_query($connected, $sql); 

        return mysqli_fetch_assoc($result);
    }

    function fetch_product_by_merchant_id($merchantID)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_all` WHERE `merchant_id`= '{$merchantID}' ORDER BY `product_name` ASC";

        return mysqli_query($connected, $sql);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #insert Product Type
    function insert_product_all($productID, $merchantID, $productType, $productName, $productPrice, $productQuantity, $productDescription)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $connected = setConnection();
        $sql = "INSERT INTO `product_all`(`product_id`, `merchant_id`, `product_type`, `product_name`, `product_price`, `product_quantity`, `product_description`, `added_date`, `added_time`) 
        VALUES ('{$productID}','{$merchantID}','{$productType}','{$productName}','{$productPrice}','{$productQuantity}','{$productDescription}','{$date}','{$time}')";

        return mysqli_query($connected, $sql);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Delete Operations
    function delete_operation_Product($productID)
    {
        $connected = setConnection();
        $sql = "DELETE FROM `product_all` WHERE `product_id` = '{$productID}'";
        return mysqli_query($connected, $sql);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #edit Operations
    function edit_operation_Product($productID, $merchantID, $productType, $productName, $productPrice, $productQuantity, $productDescription)
    {
        $connected = setConnection();
        $sql = "UPDATE `product_all` 
                SET `product_type`= '{$productType}',
                    `product_name`= '{$productName}',
                    `product_price`='{$productPrice}',
                    `product_quantity`='{$productQuantity}',
                    `product_description`='{$productDescription}'
                WHERE `product_id`='{$productID}' AND `merchant_id`='{$merchantID}'";

        return mysqli_query($connected, $sql);
    }
?>