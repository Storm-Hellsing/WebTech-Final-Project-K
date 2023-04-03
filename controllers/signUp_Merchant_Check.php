<?php

    require_once("../models/validations.php");
    require_once("../models/sql_connection.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $businessName = $_REQUEST['businessname'];
        $businessLink = $_REQUEST['businesslink'];
        $userName = $_REQUEST['username'];
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];
        $retypePassword = $_REQUEST['retypepassword'];

        #validations
        $foundBusinessname = findBusinessName($businessName);
        $validBusinessLink = validateURL($businessLink);
        $validEmail = validateEmail($userEmail);
        $foundEmail = findEmail($userEmail);
        $validPassword = validatePassword($userPassword);

        if($businessName == "" && $businessLink == "" && $userName == "" && $userEmail == "" && $userPassword == "")
        {
            header('location: ../views/signUp_Merchant.php?msg=nullInputs');
        }
        elseif($foundBusinessname == 1)
        {
            header('location: ../views/signUp_Merchant.php?msg=businessnameExsists');
        }
        elseif($validBusinessLink == 0)
        {
            header('location: ../views/signUp_Merchant.php?msg=invalidBusinessLink');
        }
        elseif($validEmail == 0)
        {
            header('location: ../views/signUp_Merchant.php?msg=invalidEmail');
        }
        elseif($foundEmail == 1)
        {
            header('location: ../views/signUp_Merchant.php?msg=emailExsists');
        }
        elseif($validPassword == 0)
        {
            header('location: ../views/signUp_Merchant.php?msg=invalidPassword');
        }
        elseif($userPassword != $retypePassword)
        {
            header('location: ../views/signUp_Merchant.php?msg=passwdMismatch');
        }
        else
        {
            $merchantID = setMerchantID();
            $userType = "Merchant";

            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d");
            $time = date("H:i:s");

            #SQLQuerry
            $sql = "INSERT INTO `user_all`(`user_id`, `user_type`, `user_name`, `user_email`, `user_password`, `user_businessname`, `user_businesslink`, `joining_date`, `joining_time`) 
                    VALUES ('{$merchantID}','{$userType}','{$userName}','{$userEmail}','{$userPassword}','{$businessName}','{$businessLink}','{$date}','{$time}')";
            $result = sqlWriteQuery($sql);

            if($result)
            {
                header('location: ../views/signIn.php?msg=signUpSuccess');
            }
            else
            {
                header('location: ../views/signUp_Merchant.php?msg=signUpfailed');
            }
        }

    }
    else
    {
        header('location: ../views/signUp_Merchant.php');
    }

?>