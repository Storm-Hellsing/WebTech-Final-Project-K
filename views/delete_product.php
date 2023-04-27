<?php

    session_start();
    require_once("../models/product_all_model.php");
    require_once("../models/product_image_all.php");

    if(isset($_COOKIE['userLoggedIn']))
    {   
        $merchantID = $_COOKIE['userLoggedIn'];
        $productID = $_REQUEST['productid'];
        $productData = fetch_product_by_product_id($productID);
        $prodcutIMG_Data = fetch_image_by_product_id($productID);
?>


<html>
    <head>
        <title>
            Delete Product
        </title>
        <link rel="stylesheet" href="../assets/stylesheets/delete_Product_Stylesheet.css">
        <script src="../assets/scripts/delete_Product_Script.js"></script>
    </head>

    <body>
        <div id="main-box">
            <input type="hidden" name="productid" id="productid" value="<?php echo($productData['product_id']); ?>">
            <input type="hidden" name="merchantid" id="merchantid" value="<?php echo($merchantID); ?>">
            <h1 id="header">Delete Product</h1>
                <table id="table">
                    <tr>
                        <th align="left">Product ID: </th>
                        <th align="right"><?php echo($productData['product_id']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Product Type: </th>
                        <th align="right"><?php echo($productData['product_type']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Product Name: </th>
                        <th align="right"><?php echo($productData['product_name']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Price: </th>
                        <th align="right"><?php echo($productData['product_price']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Quantity: </th>
                        <th align="right"><?php echo($productData['product_quantity']); ?></th>
                    </tr>
                    <tr>
                        <th align="left">Added Date: </th>
                        <th align="right"><?php echo($productData['added_date']); ?></th>
                    </tr>
                    <tr>
                </table>
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_1']); ?>" id="image">
                <hr>

                <div id="delete-button">
                <button name="delete" id="delete" onclick="delete_Product_AJAX()">Delete</button>
                </div>

                <a href="inventory.php" id="view-inventory">Inventory</a>

        </div>

       

        <div id="message-box">
            <p id="message-text"></p>
        </div>
    </body>
</html>

<?php

    }
    else
    {
        header('location: ../views/signIn.php');
    }

?>