<?php 
    
    require_once("../models/db_connection.php");
    require_once("../models/validations.php");

    #Find User Operations
    function find_Admin($userEmail, $userPassword)
    {
        #For Finding Admin
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all`
        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}' AND `user_type` = 'Admin'";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);

    }

    function find_Customer($userEmail, $userPassword)
    {
        #For Finding Customer
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all`
        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}' AND `user_type` = 'Customer'";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);

    }

    function find_Merchant($userEmail, $userPassword)
    {
        #For Finding Merchant
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all`
        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}' AND `user_type` = 'Merchant'";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);

    }

    #Fetch Data Operation
    function fetch_Data_Specific($userEmail, $userPassword)
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all`
        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}'";
        $result = mysqli_query($connected, $sql);

        return mysqli_fetch_assoc($result);

    }

    function fetch_Data_General()
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all`";
        $result = mysqli_query($connected, $sql);

        return mysqli_fetch_assoc($result);

    }

    function fetch_Data_ByID($userID)
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_id` = '{$userID}'";
        $result = mysqli_query($connected, $sql);

        return mysqli_fetch_assoc($result);

    }

    #Insert Operations
    function insert_operation_Admin($userName, $userEmail, $userPassword)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $adminID = setAdminID();

        $connected = setConnection();
        $sql = "INSERT INTO `user_all`(`user_id`, `user_type`, `user_name`, `user_email`, `user_password`, `joining_date`, `joining_time`) 
        VALUES ('{$adminID}','Admin','{$userName}','{$userEmail}','{$userPassword}','{$date}','{$time}')";

        return mysqli_query($connected, $sql);

    }

    function insert_operation_Customer($userName, $userEmail, $userPassword)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $customerID = setCustomerID();

        $connected = setConnection();
        $sql = "INSERT INTO `user_all`(`user_id`, `user_type`, `user_name`, `user_email`, `user_password`, `joining_date`, `joining_time`) 
        VALUES ('{$customerID}','Customer','{$userName}','{$userEmail}','{$userPassword}','{$date}','{$time}')";

        return mysqli_query($connected, $sql);

    }

    function insert_operation_Merchant($userName, $userEmail, $userPassword, $businessName, $businessLink)
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $merchantID = setMerchantID();

        $connected = setConnection();
        $sql = "INSERT INTO `user_all`(`user_id`, `user_type`, `user_name`, `user_email`, `user_password`, `user_businessname`, `user_businesslink`, `joining_date`, `joining_time`) 
        VALUES ('{$merchantID}','Merchant','{$userName}','{$userEmail}','{$userPassword}','{$businessName}','{$businessLink}','{$date}','{$time}')";

        return mysqli_query($connected, $sql);

    }

    #Delete Operations
    function delete_operation_User($userID)
    {
        $sql = "DELETE FROM `user_all` WHERE `user_id` = '{$userID}'";
        return mysqli_query($connected, $sql);
    }

?>