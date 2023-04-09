<?php

    require_once("../models/db_connection.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];

        #For Finding Admin
        $login_Admin = "SELECT * FROM `user_all`
                        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}' AND `user_type` = 'Admin'";
        $login_Admin_found = sqlReadQuery($login_Admin);

        #For Finding Customer
        $login_Customer = "SELECT * FROM `user_all`
                        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}' AND `user_type` = 'Customer'";
        $login_Customer_found = sqlReadQuery($login_Customer);

        #For Finding Merchant
        $login_Merchant = "SELECT * FROM `user_all`
                        WHERE `user_email`= '{$userEmail}' AND `user_password` = '{$userPassword}' AND `user_type` = 'Merchant'";
        $login_Merchant_found = sqlReadQuery($login_Merchant);

        #For Extracting every data of user
        $fetchData_Admin = getTableData($login_Admin);
        $fetchData_Customer = getTableData($login_Customer);
        $fetchData_Merchant = getTableData($login_Merchant);

        if($userEmail == "" && $userPassword == "")
        {
            header('location: ../views/signIn.php?msg=nullInputs');
        } 
        elseif($login_Admin_found === false || $login_Customer_found  === false || $login_Merchant_found  === false)
        {
            header('location: ../views/signIn.php?msg=userNotfound');

            setcookie('userLoggedIn', $userData['user_id'], time()  - 1, '/');
        }
        elseif($login_Admin_found)
        {
            #For Extracting every data of user
            $fetchData_Admin = getTableData($login_Admin);

            if($fetchData_Admin)
            {

                $userData = mysqli_fetch_assoc($fetchData_Admin);

                if($_REQUEST['keep_me_signed_in'] == "on")
                {
                    setcookie('userLoggedIn', $userData['user_id'], time() + 31536000, '/');
                }
                else
                {
                    setcookie('userLoggedIn', $userData['user_id'], time() + 3600, '/');
                }

                header('location: ../views/homePage_Admin.php');
            }
            else
            {
                header('location: ../views/signIn.php?msg=userDoesNotExsist');
            }
        }
        elseif($login_Customer_found)
        {
            #For Extracting every data of user
            $fetchData_Customer = getTableData($login_Customer);

            if($fetchData_Customer)
            {
                $userData = mysqli_fetch_assoc($fetchData_Customer);

                if($_REQUEST['keep_me_signed_in'] == "on")
                {
                    setcookie('userLoggedIn', $userData['user_id'], time() + 31536000, '/');
                }
                else
                {
                    setcookie('userLoggedIn', $userData['user_id'], time() + 3600, '/');
                }

                header('location: ../views/homePage_Customer.php');
            }
            else
            {
                header('location: ../views/signIn.php?msg=userDoesNotExsist');
            }
        }
        elseif($login_Merchant_found)
        {
            #For Extracting every data of user
            $fetchData_Merchant = getTableData($login_Merchant);

            if($fetchData_Merchant)
            {
                $userData = mysqli_fetch_assoc($fetchData_Merchant);

                if($_REQUEST['keep_me_signed_in'] == "on")
                {
                    setcookie('userLoggedIn', $userData['user_id'], time() + 31536000, '/');
                }
                else
                {
                    setcookie('userLoggedIn', $userData['user_id'], time() + 3600, '/');
                }

                header('location: ../views/homePage_Merchant.php');
            }
            else
            {
                header('location: ../views/signIn.php?msg=userDoesNotExsist');
            }
        }
        
    }

?>