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

    function find_user_all()
    {
        #For Finding all in general
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` ORDER BY user_name ASC";
        $connected = setConnection();
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function find_user_by_email($email)
    {
        #For Finding all in general
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_email` = '{$email}' ORDER BY user_name ASC";
        $connected = setConnection();
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function find_Current_Password($userID, $currentPassword)
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_id` = '{$userID}' AND `user_password` = '{$currentPassword}'";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

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
        $sql = "SELECT * FROM `user_all` ORDER BY user_name ASC";
        
        return mysqli_query($connected, $sql);

    }

    function fetch_Data_Admin()
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_type` = 'Admin' ORDER BY user_name ASC";
        
        return mysqli_query($connected, $sql);

    }

    function fetch_Data_Customer()
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_type` = 'Customer' ORDER BY user_name ASC";
        
        return mysqli_query($connected, $sql);

    }

    function fetch_Data_Merchant()
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_type` = 'Merchant' ORDER BY user_name ASC";
        
        return mysqli_query($connected, $sql);

    }

    function fetch_Data_ByID($userID)
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_id` = '{$userID}'";
        $result = mysqli_query($connected, $sql);

        return mysqli_fetch_assoc($result);

    }

    function fetch_Data_By_Email($email)
    {
        #For getting user data
        $connected = setConnection();
        $sql = "SELECT * FROM `user_all` WHERE `user_email` = '{$email}'";
        $result = mysqli_query($connected, $sql);

        return mysqli_fetch_assoc($result);

    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

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

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Delete Operations
    function delete_operation_User($userID)
    {
        $connected = setConnection();
        $sql = "DELETE FROM `user_all` WHERE `user_id` = '{$userID}'";
        return mysqli_query($connected, $sql);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Edit Operations
    function edit_opertation_Password($newPassword, $userID)
    {
        $connected = setConnection();
        $sql = "UPDATE `user_all` 
                SET `user_password`='{$newPassword}' 
                WHERE `user_id` = '{$userID}'";
        return mysqli_query($connected, $sql);
    }

    function edit_opertation_Email($email, $userID)
    {
        $connected = setConnection();
        $sql = "UPDATE `user_all` 
                SET `user_email`='{$email}' 
                WHERE `user_id` = '{$userID}'";
        return mysqli_query($connected, $sql);
    }

?>