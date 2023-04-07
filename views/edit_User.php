<?php

    session_start();
    require_once("../models/db_connection.php");

    if(isset($_REQUEST['edit']))
    {
        $productID = $_REQUEST['productid'];

        $sql = "SELECT `product_name`, `buying_price`, `selling_price` FROM `products` WHERE `product_id` = '{$productID}'";
        $result = sqlReadQuery($sql);

        if($result == 1)
        {

            $result = sqlgetTableData($sql);

            if($result)
            {
                
                $productData = mysqli_fetch_assoc($result)
?>



<html>
    <head>
        <title>
            Edit Products
        </title>
        <script type="text/javascript" src="../scripts/edit_Product_Check_Script.js"></script>
    </head>

    <body>
        <form method="POST" action="../controllers/edit_Product_Check.php" enctype="">
            <input type="hidden" name="productid" id="productid" value="<?php echo($productID) ?>"/>
            <fieldset>
                <legend>Add Products</legend>
                <label for="productname">Product Name:</label> <br/>
                <input type="text" name="productname" id="productname" value="<?php echo($productData['product_name']) ?>"/> <br/><br/>
                <label for="buyingprice">Buying Price:</label> <br/>
                <input type="number" name="buyingprice" id="buyingprice" value="<?php echo($productData['buying_price']) ?>"/> <br/><br/>
                <label for="sellingprice">Selling Price:</label> <br/>
                <input type="number" name="sellingprice" id="sellingprice" value="<?php echo($productData['selling_price']) ?>"/> <br>
                <hr>
                <input type="checkbox" name="display" id="display" value=""/>
                <label for="display">Display</label> <br/>
                <hr>
                <input type="submit" name="submit" id="submit" value="Save"/>
                <br/><br/>

                <?php

                    if(isset($_REQUEST['msg']))
                    {
                        if($_REQUEST['msg'] == 'nullInputs')
                        {
                            echo("Please fillup all the fileds.");
                        }
                        elseif($_REQUEST['msg'] == 'invalidInputs')
                        {
                            echo("Sellng Price Can not be lower than Buying Price.");
                        }

                    }

                ?>

            </fieldset>

            <br/><br/>

            <h3 align="center"><a href="product_list.php">View Product List</a></h3>

        </form>
    </body>
</html>


<?php

            }
        }
        else
        {
            echo("<h3 align='center'>Product Doesn't Exsist</h3>");
        }
    }
    else
    {
        header('location: ../views/product_list.php');
    }

?>