<?php

    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $userData = $_REQUEST['userData'];
        $credentials = json_decode($userData);

        $userName = $credentials->username;
        $userEmail = $credentials->email;
        $userPassword = $credentials->password;
        $retypePassword = $credentials->re_password;

        #validations
        $validEmail = validateEmail($userEmail);
        $foundEmail = findEmail($userEmail);
        $validPassword = validatePassword($userPassword);

        if($userName == "" || $userEmail == "" || $userPassword == "")
        {
            echo("Message:<br/><br/>
            Please Fill up all the fields.");
        }
        elseif($validEmail == 0)
        {
            echo("Message:<br/><br/>
            Please provide a proper email format.");
        }
        elseif($foundEmail == 1)
        {
            echo("Message:<br/><br/>
            The email already exists");
        }
        elseif($validPassword == 0)
        {
            echo("Message:<br/><br/>
            1. Passwords should be at least 8 characters long.<br/>
            2. Should contain atleast one symbol.<br/>
            3. Should contain at least one number.<br/>
            4. Password can not contain '|' charcter.");
        }
        elseif($userPassword != $retypePassword)
        {
            echo("Message:<br/><br/>
            The passwords mismatched.");
        }
        else
        {
            $account_created = insert_operation_Admin($userName, $userEmail, $userPassword);

            if($account_created)
            {
               echo("Account has been created.")
            }
            else
            {
                echo("Message:<br/><br/>
                Failed to create an account. Please try again later.");
            }
        }

    }
    else
    {
        header('location: ../views/signUp_Admin.php');
    }

?>