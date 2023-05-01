<html>
    <head>
        <title>Forgot Password</title>
        <link rel="stylesheet" href="../assets/stylesheets/forget_Password_Stylesheet.css"/>
        <script src="../assets/scripts/forget_Password_Script.js"></script>
    </head>

    <body>
        <div id="main-box">
            <h1 id="header">Goods and Goodies</h1>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" value=""/> <br>
            <p id="note">Please provide your registered email <br> to proceed further.</p>
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