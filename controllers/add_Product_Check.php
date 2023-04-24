<?php

    require_once("../models/product_all_model.php");
    require_once("../models/product_image_all.php");
    require_once("../models/validations.php");
    session_start();

    if(isset($_REQUEST['add']))
    {
        $productData = $_REQUEST['productData'];
        $credentials = json_decode($productData);

        $productID = $credentials->productid;
        $productType = $credentials->producttype;
        $merchantID = $credentials->merchantid;
        $productName = $credentials->produtname;
        $productPrice = $credentials->price;
        $productQuantity = $credentials->quantity;
        $productDescription = $credentials->description;
        $imageNames = $credentials->imagenames;

        #validations
        $found = find_product_by_product_name($productName);

        if($productType == "" || $productName == "" || $productPrice == "" || $productQuantity == "" || $productDescription == "")
        {
            echo("Please fill up all the fields.");
        }
        elseif($found > 0)
        {
            echo("Similar Product with that particular name already exsists. Please a unique or a different name.");
        }
        else
        {
            
            $product_added = insert_product_all($productID, $merchantID, $productType, $productName, $productPrice, $productQuantity, $productDescription);
            $imaged_added = insert_product_img($productID, isset($imageNames[0]) ? $imageNames[0]:"Not Provided", 
                            isset($imageNames[1]) ? $imageNames[1]:"Not Provided", 
                            isset($imageNames[2]) ? $imageNames[2]:"Not Provided", 
                            isset($imageNames[3]) ? $imageNames[3]:"Not Provided", 
                            isset($imageNames[4]) ? $imageNames[4]:"Not Provided");

            if($product_added && $imaged_added)
            {
                echo("Product Details has been added to inventory.");
            }
            else
            {
                echo("Unable to add product data. Please try agin later.");
            }
        }
    }
    else
    {
        header('location: ../views/add_Product.php');
    }

?>