<?php

    session_start();

    if(isset($_COOKIE['userLoggedIn']))
    {
        $userID = $_COOKIE['userLoggedIn'];
    
?>

<html>
    <head>
        <title>Change Email</title>
        <link rel="stylesheet" href="../assets/stylesheets/change_Email.css"/>
        <script src="../assets/scripts/change_Email_Script.js"></script>
    </head>

    <body>
        <input type="hidden" name="userid" id="userid" value="<?php echo($userID); ?>">
        <div id="main-box">
            <h1 id="header">Goods and Goodies</h1>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" value=""/> <br>
            <p id="note">Please provide your preffered email <br> to proceed further.</p>
            <div id="button">
            <button name="send" id="send" onclick="send_AJAX()">Send</button>
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
        header('location: ../views/signIn.php');
    }

?>