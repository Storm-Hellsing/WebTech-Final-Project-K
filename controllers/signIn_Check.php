<?php

    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $userData = $_REQUEST['userData'];
        $credentials = json_decode($userData);

        $userEmail = $credentials->email;
        $userPassword = $credentials->password;
        $keep_Me_Signed_In = $credentials->keep_me_signed_in;

        $found_Admin = find_Admin($userEmail, $userPassword);
        $found_Cutomer = find_Customer($userEmail, $userPassword);
        $found_Merchant = find_Merchant($userEmail, $userPassword);

        if($userEmail == "" || $userPassword == "")
        {
            echo("Please provide the above credentials.");
        } 
        elseif($found_Admin)
        {
            $userData = fetch_Data_Specific($userEmail, $userPassword);

            if($keep_Me_Signed_In == "on")
            {
                setcookie('userLoggedIn', $userData['user_id'], time() + 31536000, '/');
            }
            elseif($keep_Me_Signed_In == "off")
            {
                setcookie('userLoggedIn', $userData['user_id'], time() + 3600, '/');
            }

            echo("Admin Signed In");

        }
        elseif($found_Cutomer)
        {
            $userData = fetch_Data_Specific($userEmail, $userPassword);

            if($keep_Me_Signed_In == "on")
            {
                setcookie('userLoggedIn', $userData['user_id'], time() + 31536000, '/');
            }
            elseif($keep_Me_Signed_In == "off")
            {
                setcookie('userLoggedIn', $userData['user_id'], time() + 3600, '/');
            }

            echo("Customer Signed In");
        }
        elseif($found_Merchant)
        {
            $userData = fetch_Data_Specific($userEmail, $userPassword);

            if($keep_Me_Signed_In == "on")
            {
                setcookie('userLoggedIn', $userData['user_id'], time() + 31536000, '/');
            }
            elseif($keep_Me_Signed_In == "off")
            {
                setcookie('userLoggedIn', $userData['user_id'], time() + 3600, '/');
            }

            echo("Merchant Signed In");
        }
        else
        {
            echo("The email of the password might be wrong. Please try again.");
        }

    }
    else
    {
        header('location: ../views/signIn.php');
    }
        

?>