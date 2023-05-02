<?php

    session_start();
    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");

    if(isset($_REQUEST['send']))
    {
        $userData = $_REQUEST['userData'];
        $credentials = json_decode($userData);

        $userID = $credentials->userid;
        $email = $credentials->email;

        $foundEmail = find_user_by_email($email);

        if($email == "")
        {
            echo("Please provide your registered email.");
        }
        elseif($foundEmail == 1)
        {
            echo("You have enterned your current registered Email.");
        }
        else
        {
            $to = $email;
            $subject = "Email Reset Request";
            $message = "Dear user,\n\nYou have requested to change your email. Please click or copy and past the the link into your browser to change your email.\n\nlink: http://127.0.0.1/Projects/Project_Final/WebTech-Final-Project-K/controllers/email_Changed_Check.php\n\nIf you didn't make this request then ignore this email.\n\nBest Regards,\r\nTeam Goods and Goodies.";
        
            // Set headers
            $headers = "From: hellsing.technologies@gmail.com\r\n";
            $headers .= "Reply-To: hellsing.technologies@gmail.com\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
        
            // Send email
            if(mail($to, $subject, $message, $headers)) 
            {
                $_SESSION['userid'] = $userID;
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