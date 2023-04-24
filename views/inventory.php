<?php

    require_once("../models/product_all_model.php");

    if(isset($_COOKIE['userLoggedIn']))
    {

        $merchantID = $_COOKIE['userLoggedIn'];

?>

<html>
    <head>
        <title>Inventory</title>
        <link rel="stylesheet" href="../assets/stylesheets/inventory_Stylesheet.css">
        <script src="../assets/scripts/inventory_Search_Script.js"></script>
    </head>
        
    <body>
        <div id="main-box">
            <h1 align="center" id="header">Inventory</h1>
        </div>

        <div id="table-area">
            <div id="search">
                <label for="searchresult">Search User: </label>
                <input type="text" name="searchresult" id="searchresult" placeholder="Name/Type/Description/Date" value="" onkeyup="search()"/>
                <a href="add_Product.php" class="menu">Add Product</a>
            </div>
            <?php

                $found = find_product_by_merchant_id($merchantID);

                if($found > 0)
                {

            ?>
            <table align="center" border="1" width="1500px" id="user_all_table">
            <tr>
                <th width="25px">Serial No:</th>
                <th width="250px">Product ID</th>
                <th width="250px">Product Type</th>
                <th width="250px">Product Name</th>
                <th width="250px">Product Price</th>
                <th width="250px">Product Quantity</th>
                <th width="250px">Product Description</th>
                <th width="250px">Added On</th>
                <th width="250px">Time</th>
                <th width="250px" colspan="2">Action</th>
                </tr>
                    
                
                <?php
                    
                    $count = 1;
                    $fetched_Data = fetch_product_by_merchant_id($merchantID);
                    
                    while($productData = mysqli_fetch_assoc($fetched_Data))
                    {

                ?>
                <tr align="center">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $productData['product_id']; ?></td>
                    <td><?php echo $productData['product_type']; ?></td>
                    <td><?php echo $productData['product_name']; ?></td>
                    <td><?php echo $productData['product_price']; ?></td>
                    <td><?php echo $productData['product_quantity']; ?></td> <?php //Check whether the field for that specific row is empty ?>
                    <td><?php echo $productData['product_description']; ?></td>
                    <td><?php echo $productData['added_date']; ?></td>
                    <td><?php echo $productData['added_time']; ?></td>
                    <form method="GET" action="delete_product.php" enctype="">
                        <input type="hidden" name="productid" id="productid" value="<?php echo $productData['product_id']; ?>"/>
                        <td><button type="submit" name="delete" id="delete" class="delete-button">Delete</button></td>
                    </form>
                    <form method="GET" action="edit_Product.php" enctype="">
                        <input type="hidden" name="productid" id="productid" value="<?php echo $productData['product_id']; ?>"/>
                        <td><button type="submit" name="edit" id="edit" class="edit-button">Edit</button></td>
                    </form>
                </tr>
                <?php 

                    $count++;

                    }

                ?>
            </table>
        </div>

            <?php 

                }
                else
                {
                    echo("<p id='list-message'>Your Inventory is Empty. Add some products, NOW!<p>");
                }
                
            ?>

            </br> </br>
    </body>
</html>

<?php

    }
    else
    {
        header('location: ../views/signIn.php');
    }

?>