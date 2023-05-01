<?php
    
    session_start();
    session_destroy();

    if(isset($_REQUEST['resetpassword']))
    {
        $otpData = $_REQUEST['otpData'];
        $credentials = json_decode($otpData);

        $user_Email = $credentials->email;
        $receivedOTP = $credentials->receivedotp;
        $otp = $credentials->otp;

        if($otp == "")
        {
            echo('Please provide the OTP code.');
        }
        elseif($otp != $receivedOTP)
        {
            echo("The OTP Code seems to be wrong. Please try again.");
        }
        else
        {
            session_start();
            $_SESSION['useremail'] = $user_Email;
            echo("Verified");
        }
    }
    else
    {
        header('location: OTPCode.php');
    }

?>