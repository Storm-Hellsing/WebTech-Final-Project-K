<?php

    session_start();
    require_once("../models/db_connection.php");

    if(isset($_REQUEST['submit']))
    {
        $productID = $_REQUEST['productid'];
        $productName = $_REQUEST['productname'];
        $buyingPrice = $_REQUEST['buyingprice'];
        $sellingPrice = $_REQUEST['sellingprice'];
        $profit = ($sellingPrice - $buyingPrice);
        $displayable = "";

        if(isset($_REQUEST['display']))
        {
            $displayable = "Yes";
        }
        else
        {
            $displayable = "No";
        }

        if($productName == "" && $buyingPrice == "" && $buyingPrice == "")
        {
            header('location: ../views/edit_Product.php?msg=nullInputs');
        }
        elseif($sellingPrice < $buyingPrice)
        {
            header('location: ../views/edit_Product.php?msg=invalidInputs');
        }
        else
        {   
            $sql = "UPDATE `products` 
                    SET `product_name`='{$productName}',`buying_price`='{$buyingPrice}',`selling_price`='{$sellingPrice}',`profit`='{$profit}',`displayable`='{$displayable}' 
                    WHERE `product_id` = '{$productID}'";
            $result = sqlWriteQuery($sql);

            if($result)
            {
                header('location: ../views/product_list.php?msg=editsuccess');
            }
            else
            {
                header('location: ../views/product_list.php?msg=editfailed');
            }
        }
    }
    else
    {
        header('location: ../views/product_list.php');
    }

?>