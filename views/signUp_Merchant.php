<html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="../stylesheets/signUp_Merchant_Stylesheet.css"/>
        <script src="../scripts/signUp_Merchant_Script.js"></script>
    </head>

    <body>
        <form id="signup" method="POST" action="../controllers/signUp_Merchant_Check.php" enctype="">
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
                    <button type="submit" name="submit" id="button">Sign Up</button>
                </div>
            </div>
        </form>

        <?php

            if(isset($_REQUEST['msg']))
            {
            
        ?>

        <div class="message-box">
            Message:
            <p id="message-box-paragrapgh">
                <?php

                    if($_REQUEST['msg'] == 'nullInputs')
                    {
                        echo("Please fillup all the fileds.");
                    }
                    elseif($_REQUEST['msg'] == 'businessnameExsists')
                    {
                        echo("Businessname Already Again. Please try agian with a new and unique name.");
                    }
                    elseif($_REQUEST['msg'] == 'invalidBusinessLink')
                    {
                        echo("Invalid Business Link");
                    }
                    elseif($_REQUEST['msg'] == 'invalidEmail')
                    {
                        echo("Invalid Email Format");
                    }
                    elseif($_REQUEST['msg'] == 'emailExsists')
                    {
                        echo("Email already exsists. Please try with a new and unique Email.");
                    }
                    elseif($_REQUEST['msg'] == 'invalidPassword')
                    {
                        echo("1. Passwords should be at least 8 characters long.<br/>
                            2. Should contain atleast one symbol.<br/>
                            3. Should contain at least one number.<br/>
                            4. Password can not contain '|' charcter.");
                    }
                    elseif($_REQUEST['msg'] == 'passwdMismatch')
                    {
                        echo("Passwords didn't match.");
                    }
                    elseif($_REQUEST['msg'] == 'signUpfailed')
                    {
                        echo("Couldn't create an account. Please try again later.");
                    }

                ?>
            </p>
        </div>

        <?php

            }

        ?>
    </body>
</html>