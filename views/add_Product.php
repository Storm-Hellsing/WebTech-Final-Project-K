<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

    

?>

<html>
    <head>
        <title>Product Types</title>
        <link rel="stylesheet" href="../assets/stylesheets/add_Product_Stylesheet.css">
    </head>

    <body>
        <h1>Add Product</h1>
        <div id="main-box">
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
            <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/png">
            <br/>
            <hr id="hr">
            <button name="add" id="add">Add</button>
        </div>
    </body>
</html>

<?php

    }

?>