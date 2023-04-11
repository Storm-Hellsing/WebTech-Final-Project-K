<?php

    require_once("../models/validations.php");
    require_once("../models/user_all_model.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $userName = $_REQUEST['username'];
        $userEmail = $_REQUEST['email'];
        $userPassword = $_REQUEST['password'];
        $retypePassword = $_REQUEST['retypepassword'];

        #validations
        $validEmail = validateEmail($userEmail);
        $foundEmail = findEmail($userEmail);
        $validPassword = validatePassword($userPassword);

        if($userName == "" && $userEmail == "" && $userPassword == "")
        {
            header('location: ../views/signUp_Customer.php?msg=nullInputs');
        }
        elseif($validEmail == 0)
        {
            header('location: ../views/signUp_Customer.php?msg=invalidEmail');
        }
        elseif($foundEmail == 1)
        {
            header('location: ../views/signUp_Customer.php?msg=emailExsists');
        }
        elseif($validPassword == 0)
        {
            header('location: ../views/signUp_Customer.php?msg=invalidPassword');
        }
        elseif($userPassword != $retypePassword)
        {
            header('location: ../views/signUp_Customer.php?msg=passwdMismatch');
        }
        else
        {
            $account_created = insert_operation_Customer($userName, $userEmail, $userPassword);

            if($account_created)
            {
                header('location: ../views/signIn.php?msg=signUpSuccess');
            }
            else
            {
                header('location: ../views/signUp_Customer.php?msg=signUpfailed');
            }
        }

    }
    else
    {
        header('location: ../views/signUp_Customer.php');
    }

?>