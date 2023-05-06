<?php

    require_once("../models/user_all_model.php");
    require_once("../models/wish_list_all_model.php");

    if(isset($_COOKIE['userLoggedIn']))
    {
        $userID = $_COOKIE['userLoggedIn'];

?>

<html>
    <head>
        <title>Wish List</title>
        <link rel="stylesheet" href="../assets/stylesheets/user_all_List_Stylesheet.css">
        <script src="../assets/scripts/user_all_Search_Script.js"></script>
    </head>
        
    <body>
        <div id="main-box">
            <h1 align="center" id="header">Wish List</h1>
            <a href="user_Admin_List.php" target="_blank" class="menu">Admin's List</a>
            <a href="user_Customer_List.php" target="_blank" class="menu">Customer's List</a>
            <a href="user_Merchant_List.php?" target="_blank" class="menu">Merchant's List</a>
        </div>

        <div id="table-area">
            <div id="search">
                <label for="searchresult">Search User: </label>
                <input type="text" name="searchresult" id="searchresult" placeholder="Name/Email/Mobile/Business" value="" onkeyup="search()"/>
            </div>
            <?php

                $found = find_wish_list_by_user_id($userID);

                if($found > 0)
                {

            ?>
            <table align="center" border="1" width="1500px" id="user_all_table">
            <tr>
                <th width="25px">Serial No:</th>
                <th width="250px">Product ID</th>
                <th width="250px">Product Name</th>
                <th width="250px">Merchant Name</th>
                <th width="250px">Product Price</th>
                <th width="250px">Product Description</th>
                <th width="250px" colspan="2">Action</th>
                </tr>
                    
                
                <?php
                    
                    $count = 1;
                    $fetched_Data = fetch_wish_list_by_user_id($userID);
                    
                    while($wishData = mysqli_fetch_assoc($fetched_Data))
                    {

                ?>
                <tr align="center">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $wishData['product_id']; ?></td>
                    <td><?php echo $wishData['product_name']; ?></td>
                    <td><?php echo $wishData['merchant_name']; ?></td>
                    <td><?php echo $wishData['product_price']; ?></td>
                    <td><?php echo $wishData['product_description']; ?></td>
                    <form method="GET" action="delete_User.php" enctype="">
                        <input type="hidden" name="userid" id="userid" value="<?php echo $userData['user_id']; ?>"/>
                        <td><button type="submit" name="delete" id="delete" class="delete-button">Delete</button></td>
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
                    echo("<b>The List is empty.</b>");
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