<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {
        require_once("../models/user_all_model.php");
        require_once("../models/product_all_model.php");
        require_once("../models/product_image_all.php");
        require_once("../models/validations.php");
        $merchantID = $_REQUEST['merchantid'];
        $productID = $_REQUEST['productid'];
        
        $merchantData = fetch_Data_ByID($merchantID);
        $productData = fetch_product_by_product_id($productID);
        $prodcutIMG_Data = fetch_image_by_product_id($productID);
?>

<html>
    <head>
        <title>Product View</title>
        <link rel="stylesheet" href="../assets/stylesheets/view_Product_Stylesheet.css">
        <script src="../assets/scripts/add_Product_Script.js"></script>
    </head>

    <body>
        <input type="hidden" name="merchantid" id="merchantid" value="<?php echo($merchantID); ?>"/>
        <div id="main-box">
        <h1 id="header">Product View</h1>
        <a href="inventory.php" id="link-cart">Cart</a>
           <p>Merchant: <?php echo($merchantData['user_businessname']); ?></p>
           <p>Product Name: <?php echo($productData['product_name']); ?></p>
           <p>Price (Tk): <?php echo($productData['product_price']); ?></p>
           <label for="quantity">Quantity:</label>
           <input type="number" name="quantity" id="quantity" value="1">
           <p>Description: <p><?php echo($productData['product_description']); ?></p> </p>
            <button name="addtocart" id="addtocart" onclick="">Add to Cart</button>
            <div id="preview-container">
                <?php if (file_exists("../assets/server_uploads/merchant_uploads/".$merchantID."/products/".$productID."/".$prodcutIMG_Data['product_img_1'])) { ?>
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_1']); ?>" class="image-previewer"/>
                <?php } ?>
                <?php if (file_exists("../assets/server_uploads/merchant_uploads/".$merchantID."/products/".$productID."/".$prodcutIMG_Data['product_img_2'])) { ?>
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_2']); ?>" class="image-previewer"/>
                <?php } ?>
                <?php if (file_exists("../assets/server_uploads/merchant_uploads/".$merchantID."/products/".$productID."/".$prodcutIMG_Data['product_img_3'])) { ?>
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_3']); ?>" class="image-previewer"/>
                <?php } ?>
                <?php if (file_exists("../assets/server_uploads/merchant_uploads/".$merchantID."/products/".$productID."/".$prodcutIMG_Data['product_img_4'])) { ?>
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_4']); ?>" class="image-previewer"/>
                <?php } ?>
                <?php if (file_exists("../assets/server_uploads/merchant_uploads/".$merchantID."/products/".$productID."/".$prodcutIMG_Data['product_img_5'])) { ?>
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_5']); ?>" class="image-previewer"/>
                <?php } ?>
            </div>
        </div>

        <div id="message-box">
                <table>
                    <tr>
                        <td><p id="message-text"></p></td>
                    </tr>
                </table>
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