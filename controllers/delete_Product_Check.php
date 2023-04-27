<?php

    session_start();
    require_once("../models/product_all_model.php");

    if(isset($_REQUEST['delete']))
    {
        $productData = $_REQUEST['productData'];
        $credentials = json_decode($productData);

        $productID = $credentials->productid;
        $merchantID = $credentials->merchantid;
        $dir = "../assets/server_uploads/merchant_uploads/{$merchantID}/products/{$productID}/";

        $deleted_product = delete_operation_Product($productID);

        if($deleted_product)
        {
            if (file_exists($dir) && is_dir($dir)) 
            {
                // Open the directory
                $handle = opendir($dir);
                
                // Loop through the files and delete them
                while (false !== ($file = readdir($handle))) 
                {
                    if ($file != '.' && $file != '..') 
                    {
                        unlink($dir . $file);
                    }
                }
                
                // Close the directory
                closedir($handle);
                
                // Delete the directory
                rmdir($dir);
            }
            
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