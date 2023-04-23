<?php

    session_start();
    require_once("../models/product_all_model.php");

    if(isset($_REQUEST['delete']))
    {
        $productData = $_REQUEST['productData'];
        $credentials = json_decode($productData);

        $productID = $credentials->productid;

        $deleted_product = delete_operation_Product($productID);

        if($deleted_product)
        {
            echo("The product has been deleted.");
        }
        else
        {
            echo("Could not delete the product.");  
        }
    }
    else
    {
        header('location: ../views/delete_Product.php');
    }

?>