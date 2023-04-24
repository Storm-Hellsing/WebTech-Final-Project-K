<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

        require_once("../models/product_type_model.php");
        require_once("../models/product_all_model.php");
        require_once("../models/product_image_all.php");
        $merchantID = $_COOKIE['userLoggedIn'];
        $productID = $_REQUEST['productid'];
        $productData = fetch_product_by_product_id($productID);
        $prodcutIMG_Data = fetch_image_by_product_id($productID)

?>

<html>
    <head>
        <title>Edit Product</title>
        <link rel="stylesheet" href="../assets/stylesheets/edit_Product_Stylesheet.css">
        <script src="../assets/scripts/edit_Product_Script.js"></script>
    </head>

    <body>
        <input type="hidden" name="productid" id="productid" value="<?php echo($productID); ?>"/>
        <input type="hidden" name="merchantid" id="merchantid" value="<?php echo($merchantID); ?>"/>
        <div id="main-box">
        <h1 id="header">Edit Product</h1>
        <a href="inventory.php" id="link-product-list">Inventory</a>
            <label for="productype" class="labels">Product Type:</label>
            <br/>
            <select name="producttype" id="producttype" class="inputs">
                <option value="">Select Product Type</option>
            <?php

                $result = fetch_product_type_general();

                while($productType = mysqli_fetch_assoc($result))
                {

            ?>
                <option value="<?php echo($productType['product_type_name']); ?>"><?php echo($productType['product_type_name']); ?></option>
            <?php

                }

            ?>
            </select>
            <br/>
            <label for="produtname" class="labels">Product Name:</label><br/>
            <input type="text" name="produtname" id="produtname" class="inputs" value="<?php echo($productData['product_name']); ?>"/>
            <br/>
            <label for="price" class="labels">Price (TK):</label><br/>
            <input type="number" name="price" id="price" class="inputs" value="<?php echo($productData['product_price']); ?>"/>
            <br/>
            <label for="quantity" class="labels">Quantity:</label><br/>
            <input type="number" name="quantity" id="quantity" class="inputs" value="<?php echo($productData['product_quantity']); ?>"/>
            <br/>
            <label for="description" class="labels">Product Description:</label><br/>
            <textarea name="description" id="description" class="inputs" cols="30" rows="5"><?php echo($productData['product_description']); ?></textarea>
            <br/>
            <br/>
            <hr id="hr">
            <button name="edit" id="edit" onclick="editProduct_AJAX()">Edit</button>
            <div id="preview-container">
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_1']); ?>" id="image-previewer"/>
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