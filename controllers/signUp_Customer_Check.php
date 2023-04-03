<?php

    require_once("../models/validations.php");
    require_once("../models/sql_connection.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $userName = $_REQUEST['username'];
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];
        $retypePassword = $_REQUEST['retypepassword'];

        #validations
        $validEmail = validateEmail($userEmail);
        $foundEmail = findEmail($userEmail);
        $validPassword = validatePassword($userPassword);

        if($userName == "" && $userEmail == "" && $userPassword == "")
        {
            header('location: ../views/signUp_Customer.php?msg=nullInputs');
        }
        elseif($validEmail == 0)
        {
            header('location: ../views/signUp_Customer.php?msg=invalidEmail');
        }
        elseif($foundEmail == 1)
        {
            header('location: ../views/signUp_Customer.php?msg=emailExsists');
        }
        elseif($validPassword == 0)
        {
            header('location: ../views/signUp_Customer.php?msg=invalidPassword');
        }
        elseif($userPassword != $retypePassword)
        {
            header('location: ../views/signUp_Customer.php?msg=passwdMismatch');
        }
        else
        {
            $customerID = setCustomerID();
            $userType = "Customer";

            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d");
            $time = date("H:i:s");

            #SQLQuerry
            $sql = "INSERT INTO `user_all`(`user_id`, `user_type`, `user_name`, `user_email`, `user_password`, `joining_date`, `joining_time`) 
                    VALUES ('{$customerID}','{$userType}','{$userName}','{$userEmail}','{$userPassword}','{$date}','{$time}')";
            $result = sqlWriteQuery($sql);

            if($result)
            {
                header('location: ../views/signIn.php?msg=signUpSuccess');
            }
            else
            {
                header('location: ../views/signUp_Customer.php?msg=signUpfailed');
            }
        }

    }
    else
    {
        header('location: ../views/signUp_Customer.php');
    }

?>