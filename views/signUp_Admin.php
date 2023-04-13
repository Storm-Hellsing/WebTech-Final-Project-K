<html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="../assets/stylesheets/signUp_Admin_Stylesheet.css">
        <script src="../assets/scripts/signUp_Admin_Script.js"></script>
    </head>

    <body>
            <div class="signup-box">
                <h2 id="companyname">Goods and Goodies</h2>
                <h2>Assign Admin</h2>
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
                <div class="signupbutton">
                    <button name="submit" id="button" onclick="signup_AJAX()">Sign Up</button>
                </div>
            </div>

            <div id="message-box">
                <p id="message-text"></p>
            </div>

    </body>
</html>