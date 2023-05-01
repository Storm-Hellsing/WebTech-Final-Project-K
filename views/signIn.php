<html>
    <head>
        <title>Sign In Page</title>
        <link rel="stylesheet" href="../assets/stylesheets/signIn_Stylesheet.css">
        <script src="../assets/scripts/signIn_Script.js"></script>
        <script>
            document.addEventListener('keydown', function(event) 
            {
                if (event.keyCode === 13) 
                {
                    document.getElementById('button').click();
                }
            });
        </script>
    </head>

    <body>
            <div class="signin-box">
                <h2 id="companyname">Goods and Goodies</h2>
                <h1>Sign In</h1>
                <div class="form-box">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" id="password" value=""/>
                    <button id="show-password" onclick="togglePassword()">Show</button>
                    <br>
                </div>
                <div>
                    <table>
                        <tr>
                            <th>
                                <input type="checkbox" name="keep_me_signed_in" id="keep_me_signed_in" class="check-box"/>
                            </th>
                            <th>
                                <label for="keep_me_signed_in">Keep me signed in</label>
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="links">
                    <a href="signUp_Customer.php" id="signup-link">Create an account?</a>
                </div>
                <div class="siginbutton">
                    <button name="submit" id="button" onclick="signup_AJAX()">Sign In</button>
                </div>
                <div class="forgotpasswordbutton">
                    <a href="forget_Password.php" name="submit" id="button-forgotpass">Forgot Password?</a>
                </div>
            </div>

            <div id="message-box">
                <p id="message-text"></p>
            </div>
            
    </body>
</html>