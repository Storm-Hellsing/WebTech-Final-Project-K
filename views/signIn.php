<html>
    <head>
        <title>Sign In Page</title>
        <link rel="stylesheet" href="../sytlesheets/signIn.css">
    </head>

    <body>
        <div class="signup-box">
            <h2 id="Trade">Goods and Goodies</h2>
            <h1>Sign In</h1>
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
            <div class="signupbutton">
                <a href="#" class="button">
                    Sign Up
                </a>
            </div>
        </div>
    </body>
</html>