<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

        require_once("../models/product_type_model.php");
        require_once("../models/validations.php");
        $merchantID = $_COOKIE['userLoggedIn'];
        $productID = setProductCode();
?>

<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="../assets/stylesheets/add_Product_Stylesheet.css">
        <script src="../assets/scripts/add_Product_Script.js"></script>
    </head>

    <body>
        <input type="hidden" name="merchantid" id="merchantid" value="<?php echo($merchantID); ?>"/>
        <input type="hidden" name="productid" id="productid" value="<?php echo($productID); ?>"/>
        <div id="main-box">
        <h1 id="header">Add Product</h1>
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
            <input type="text" name="produtname" id="produtname" class="inputs" value=""/>
            <br/>
            <label for="price" class="labels">Price (TK):</label><br/>
            <input type="number" name="price" id="price" class="inputs" value=""/>
            <br/>
            <label for="quantity" class="labels">Quantity:</label><br/>
            <input type="number" name="quantity" id="quantity" class="inputs" value=""/>
            <br/>
            <label for="description" class="labels">Product Description:</label><br/>
            <textarea name="description" id="description" class="inputs" cols="30" rows="5"></textarea>
            <br/>
            <input type="file" name="image[]" id="image" accept="images/*" multiple onchange="previewImages(event)">
            <br/>
            <hr id="hr">
            <button name="add" id="add" onclick="addProduct_AJAX(); storeFile(); previewImages(event);">Add</button>
            <div id="preview-container">
                <img src="../assets/graphics/package.png" id="image-previewer"/>
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