<?php

    session_start();

    if(isset($_SESSION['sentotp']) && isset($_SESSION['useremail']))
    {
        $received_OTP = $_SESSION['sentotp'];
        $user_Email = $_SESSION['useremail'];

?>


<html>
    <head>
        <title>OTP Channel</title>
        <link rel="stylesheet" href="../assets/stylesheets/otp_Channel_Stylesheet.css">
        <script src="../assets/scripts/otp_Channel_Script.js"></script>
    </head>

    <body>
        <input type="hidden" name="receivedotp" id="receivedotp" value="<?php echo($received_OTP); ?>"/>
        <input type="hidden" name="email" id="email" value="<?php echo($user_Email); ?>"/>
        <div id="main-box">
            <h1 id="header">Goods and Goodies</h1>
            <label for="otp">Enter Code:</label><br>
            <input type="text" name="otp" id="otp" value=""/> <br>
            <p id="note">An otp code has been sent to your<br>email please check it.</p>
            <div id="button">
            <button name="resetpassword" id="resetpassword" onclick="verifyOTP_AJAX()">Reset Password</button>
            </div>
        </div>

        <div id="message-box">
            <table>
                <tr>
                    <td><p id="message-text"></p></td>
                </tr>
            </table>
        </div>
    </body>
</html>

<?php

    }
    else
    {
        session_start();
        session_destroy();
        header('location: forget_Password.php');
    }

?>