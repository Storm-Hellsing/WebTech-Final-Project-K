<html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="../assets/stylesheets/signUp_Merchant_Stylesheet.css"/>
        <script src="../assets/scripts/signUp_Merchant_Script.js"></script>
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
        
            <div class="signup-box">
                <h2 id="companyname">Goods and Goodies</h2>
                <h1>Sign Up</h1>
                <div class="form-box">
                    <label for="businessname">Business Name:</label><br>
                    <input type="text" name="businessname" id="businessname" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="businesslink">Business URL:</label><br>
                    <input type="text" name="businesslink" id="businesslink" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="username">User Name:</label><br>
                    <input type="text" name="username" id="username" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" id="password" value=""/>
                    <br>
                </div>
                <div class="form-box">
                    <label for="retypepassword">Retype Password:</label><br>
                    <input type="password" name="retypepassword" id="retypepassword" value=""/>
                    <br> <br>
                </div>
                <div>
                    <table>
                        <tr>
                            <th>
                                <input type="checkbox" name="show_password" id="show_password" class="check-box" onclick="togglePassword()"/>
                            </th>
                            <th>
                                <label for="show_password">Show Password</label>
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="links">
                    <a href="signIn.php" id="signup-link">Already have an account?</a>
                </div>
                <div class="signupbutton">
                    <button name="submit" id="button" onclick="signup_AJAX()">Sign Up</button>
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