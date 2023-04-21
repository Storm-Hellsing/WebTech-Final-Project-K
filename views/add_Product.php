<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

    

?>

<html>
    <head>
        <title>Product Types</title>
        <link rel="stylesheet" href="../assets/stylesheets/add_Product_Stylesheet.css">
        <script src="../assets/scripts/add_Product_Script.js"></script>
    </head>

    <body>
        <div id="main-box">
        <h1 id="header">Add Product</h1>
        <a href="" id="link-product-list">View Product List</a>
            <label for="productype" class="labels">Product Type:</label>
            <br/>
            <select name="productType" id="productType" class="inputs">
                <option value="">Select Product Type</option>
                <option value="Electronics">Electronics</option>
                <option value="Clothing">Clothing</option>
                <option value="Gadgets and Accessories">Gadgets and Accessories</option>
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
            <button name="add" id="add">Add</button>
            <div id="preview-container">
                <img src="../assets/graphics/package.png" id="image-previewer"/>
            </div>
        </div>
    </body>
</html>

<?php

    }

?>