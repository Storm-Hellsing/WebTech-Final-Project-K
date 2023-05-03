<?php

    require_once("../models/user_image_all_model.php");
    session_start();

    if(isset($_REQUEST['add']))
    {
        $profileData = $_REQUEST['profileData'];
        $credentials = json_decode($profileData);

        $userID = $credentials->userid;
        $imgName = $credentials->imagename;

        $imaged_added = insert_user_img($userID, $imgName[0]);

        if($imaged_added)
        {
            echo("Profile Photo Uploaded.");
        }
        else
        {
            echo("Unable to add profile photo. Please try agin later.");
        }
    }
    else
    {
        header('location: ../views/add_Product.php');
    }

?>