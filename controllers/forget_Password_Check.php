<?php

    session_start();
    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");

    if(isset($_REQUEST['send']))
    {
        $userData = $_REQUEST['userData'];
        $credentials = json_decode($userData);

        $email = $credentials->email;
        
        $foundEmail = find_user_by_email($email);

        if($email == "")
        {
            echo("Please provide your registered email.");
        }
        elseif($foundEmail <= 0)
        {
            echo("Sorry, the is not registered.");
        }
        else
        {
            $otpCode = setOTP();

            $to = $email;
            $subject = "Password Reset Request";
            $message = "Dear user,\n\nYou have requested to reset your password. Please use the code given below to proceed futher for resetting your password. The code will remain active for 5 minutes.\n\nCode: {$otpCode}\n\nIf you didn't make this request then ignore this email.\n\nBest Regards, \r\nTeam Goods and Goodies.";
        
            // Set headers
            $headers = "From: hellsing.technologies@gmail.com\r\n";
            $headers .= "Reply-To: hellsing.technologies@gmail.com\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
        
            // Send email
            if(mail($to, $subject, $message, $headers)) 
            {
                $_SESSION['sentotp'] = $otpCode;
                $_SESSION['useremail'] = $email;
                echo("Email Sent");
            } 
            else
            {
                echo("Could not send the email. Please check your internet connection.");
            }
        }
    }
    else
    {
        header('location: forget_Password.php');
    }


?>