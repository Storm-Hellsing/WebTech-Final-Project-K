<?php

    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];

        $found_Admin = find_Admin($userEmail, $userPassword);
        $found_Cutomer = find_Customer($userEmail, $userPassword);
        $found_Merchant = find_Merchant($userEmail, $userPassword);

        if($userEmail == "" && $userPassword == "")
        {
            header('location: ../views/signIn.php?msg=nullInputs');
        } 
        elseif($found_Admin)
        {
            $userData = fetch_Data($userEmail, $userPassword);

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
        elseif($found_Cutomer)
        {
            $userData = fetch_Data($userEmail, $userPassword);

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
        elseif($found_Merchant)
        {
            $userData = fetch_Data($userEmail, $userPassword);

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
            header('location: ../views/signIn.php?msg=userNotfound');
        }

    }
    else
    {
        header('location: ../views/signIn.php');
    }
        

?>