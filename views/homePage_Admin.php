<?php

    session_start();
    require_once("../models/user_all_model.php");
    require_once("../models/product_all_model.php");
    require_once("../models/product_image_all.php");

    if(isset($_COOKIE['userLoggedIn']))
    {
        $userID =  $_COOKIE['userLoggedIn'];

        $userData = fetch_Data_ByID($userID);
        $found = find_product_all_general();
?>

<html>
    <head>
        <title>Home Admin</title>
        <link rel="stylesheet" href="../assets/stylesheets/homePage_Admin.css">
    </head>

    <body>
        <div class="main-box">
            <h1>Goods and Goodies</h1> <br/>
            <h3 id="user-welcome">Welcome, <?php echo($userData['user_name']); ?></h3>
            <a href="operations.php" target="_blank" class="menu">Operations</a>
            <a href="" target="_blank" class="menu">My Orders</a>
            <a href="" target="_blank" class="menu">My Cart</a>
            <a href="user_all_List.php" target="_blank" class="menu">View Users</a>
            <a href="" target="_blank" class="menu">Settings</a>
            <a href="" target="_blank" class="menu">My profile</a>
            <a href="logout.php" class="menu">Logout</a>
        </div>

        <div class="categories">
            <p>Just for You</p>
        </div>
        <div class="container-box">
            <?php 
            
                if($found > 0)
                {
                    $data = fetch_product_all_general();

                    while($productData = mysqli_fetch_assoc($data))
                    {
                        $productID = $productData['product_id'];
                        $merchantID = $productData['merchant_id'];
                        $prodcutIMG_Data = fetch_image_by_product_id($productID);
            ?>
            <div class="content-box">
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_1']); ?>" id="product-image">
                <div id="labels">
                    <p class="label"><?php echo($productData['product_name']); ?></p>
                    <p class="label">Tk: <?php echo($productData['product_price']); ?></p>
                </div>
            </div>
            <?php

                    }
                }

            ?>
        </div>
        
        <div class="categories">
            <p>Electornics</p>
        </div>
        <div class="container-box">
            <?php 
            
                if($found > 0)
                {
                    $data = fetch_product_all_general();

                    while($productData = mysqli_fetch_assoc($data))
                    {
                        $productID = $productData['product_id'];
                        $merchantID = $productData['merchant_id'];
                        $prodcutIMG_Data = fetch_image_by_product_id($productID);
            ?>
            <div class="content-box">
                <img src="../assets/server_uploads/merchant_uploads/<?php echo($merchantID); ?>/products/<?php echo($productID); ?>/<?php echo($prodcutIMG_Data['product_img_1']); ?>" id="product-image">
                <div id="labels">
                    <p class="label"><?php echo($productData['product_name']); ?></p>
                    <p class="label">Tk: <?php echo($productData['product_price']); ?></p>
                </div>
            </div>
            <?php

                    }
                }

            ?>
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