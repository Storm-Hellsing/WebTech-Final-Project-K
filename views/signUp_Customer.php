<html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="../sytlesheets/signUp_Customer.css">
    </head>

    <body>
        <div class="signup-box">
            <h2 id="Trade">Goods and Goodies</h2>
            <h1>Sign Up</h1>
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
                <span toggle="#password" class="eye"></span>
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
                            <input type="checkbox" name="show_password" id="show_password" class="check-box"/>
                        </th>
                        <th>
                            <label for="show_password">Show Password</label>
                        </th>
                    </tr>
                </table>
            </div>
            <div class="signupbutton">
                <a href="#" class="button">
                    Sign Up
                </a>
            </div>
        </div>
    </body>
</html>