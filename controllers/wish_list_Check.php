<?php

    require_once("../models/user_all_model.php");
    require_once("../models/product_all_model.php");
    require_once("../models/validations.php");
    require_once("../models/wish_list_all_model.php");
    session_start();

    if(isset($_REQUEST['wish']))
    {
        $wishData = $_REQUEST['wishData'];
        $credentials = json_decode($wishData);

        $productID = $credentials->productid;
        $userID = $credentials->userid;
        $merchantID = $credentials->merchantid;

        $merchantData = fetch_Data_ByID($merchantID);
        $merchantName = $merchantData['user_name'];

        $productData = fetch_product_by_product_id($productID);
        $productName = $productData['product_name'];
        $productPrice = $productData['product_price'];
        $productDescription = $productData['product_description'];
            
        $wished_Added = insert_wish_list($userID, $productID, $merchantName, $productName, $productPrice, $productDescription);

        if($wished_Added )
        {
            echo("Product has been added to wish list.");
        }
        else
        {
            echo("Unable to add product to wish list. Please try agin later.");
        }
    }
    else
    {
        header('location: ../views/add_Product.php');
    }

?>