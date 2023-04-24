<?php

if(isset($_REQUEST['merchantid']) && isset($_FILES['images']) && isset($_REQUEST['productid']))
{
    $productID = $_REQUEST['productid'];
    $merchantID = $_REQUEST['merchantid'];
    $dir = "../assets/server_uploads/merchant_uploads/{$merchantID}/products/{$productID}/";

    if(file_exists($dir) == false)
    {
        mkdir($dir, 0777, true);
    }

    foreach($_FILES['images']['tmp_name'] as $key => $tmp_name)
    {
        $file_name = $_FILES['images']['name'][$key];
        $file_size = $_FILES['images']['size'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        $file_type = $_FILES['images']['type'][$key];
        move_uploaded_file($file_tmp,"{$dir}{$file_name}");
    }
}
?>
