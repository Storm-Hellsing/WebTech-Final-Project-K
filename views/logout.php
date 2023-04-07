<?php

    session_start();
    session_destroy();
    setcookie('userLoggedIn', $userData['user_id'], time()  - 1, '/');
    header('location: signIn.php');
?>