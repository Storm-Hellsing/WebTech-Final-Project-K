<html>
    <head>
        <title>Sign In Page</title>
        <link rel="stylesheet" href="../stylesheets/signIn_Stylesheet.css">
    </head>

    <body>
        <form method="POST" action="../controllers/signIn_Check.php" enctype="">
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
                    <button type="submit" name="submit" id="button">Sign In</button>
                </div>
                <div class="forgotpasswordbutton">
                    <button type="submit" name="submit" id="button-forgotpass">Forgot Password?</button>
                </div>
            </div>
        </form>

        <?php

            if(isset($_REQUEST['msg']))
            {

        ?>

        <div class="message-box">
            Message:
            <p id="message-box-paragraph">

                <?php

                    if($_REQUEST['msg'] == 'signUpSuccess')
                    {
                        echo("Your account has been created successfully. You can now Sign In.");
                    }
                    elseif($_REQUEST['msg'] == 'nullInputs')
                    {
                        echo("Please provide the above credentials.");
                    }
                    elseif($_REQUEST['msg'] == 'userNotfound')
                    {
                        echo("The email or the password might be wrong.");
                    }

                ?>

            </p>
        </div>

        <?php

            }

        ?>

    </body>
</html>