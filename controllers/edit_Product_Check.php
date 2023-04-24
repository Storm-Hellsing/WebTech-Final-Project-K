<?php

    require_once("../models/product_all_model.php");
    session_start();

    if(isset($_REQUEST['edit']))
    {
        $productData = $_REQUEST['productData'];
        $credentials = json_decode($productData);

        $productID = $credentials->productid;
        $merchantID = $credentials->merchantid;
        $productType = $credentials->producttype;
        $productName = $credentials->produtname;
        $productPrice = $credentials->price;
        $productQuantity = $credentials->quantity;
        $productDescription = $credentials->description;

        if($productType == "" || $productName == "" || $productPrice == "" || $productQuantity == "" || $productDescription == "")
        {
            echo("Please fill up all the fields.");
        }
        else
        {
            $product_edited = edit_operation_Product($productID, $merchantID, $productType, $productName, $productPrice, $productQuantity, $productDescription);

            if($product_edited)
            {
                echo("Product Details has been updated.");
            }
            else
            {
                echo("Unable to update product data. Please try agin later.");
            }
        }
    }
    else
    {
        header('location: ../views/inventory.php');
    }

?>