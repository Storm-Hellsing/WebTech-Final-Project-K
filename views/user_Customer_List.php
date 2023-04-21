<?php

    require_once("../models/user_all_model.php");

    if(isset($_COOKIE['userLoggedIn']))
    {

?>

<html>
    <head>
        <title>Customers' List</title>
        <link rel="stylesheet" href="../assets/stylesheets/user_all_List_Stylesheet.css">
        <script src="../assets/scripts/user_all_Search_Script.js"></script>
    </head>
        
    <body>
        <div id="main-box">
            <h1 align="center" id="header">Customers' List</h1>
            <a href="user_Admin_List.php" class="menu">Admin's List</a>
            <a href="user_Customer_List.php" class="menu">Customer's List</a>
            <a href="user_Merchant_List.php?" class="menu">Merchant's List</a>
        </div>

        <div id="table-area">
            <div id="search">
                <label for="searchresult">Search User: </label>
                <input type="text" name="searchresult" id="searchresult" placeholder="Name/Email/Mobile/Business" value="" onkeyup="search()"/>
            </div>
            <?php

                $found = find_user_all();

                if($found > 0)
                {

            ?>
            <table align="center" border="1" width="1500px" id="user_all_table">
            <tr>
                <th width="25px">Serial No:</th>
                <th width="250px">User ID</th>
                <th width="250px">User Type</th>
                <th width="250px">User Name</th>
                <th width="250px">User Email</th>
                <th width="250px">User Mobile</th>
                <th width="250px">Joining Date</th>
                <th width="250px">Time</th>
                <th width="250px" colspan="2">Action</th>
                </tr>
                    
                
                <?php
                    
                    $count = 1;
                    $fetched_Data = fetch_Data_Customer();
                    
                    while($userData = mysqli_fetch_assoc($fetched_Data))
                    {

                ?>
                <tr align="center">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $userData['user_id']; ?></td>
                    <td><?php echo $userData['user_type']; ?></td>
                    <td><?php echo $userData['user_name']; ?></td>
                    <td><?php echo $userData['user_email']; ?></td>
                    <td><?php echo isset($userData['user_mobile']) ? $userData['user_mobile'] : ''; ?></td>
                    <td><?php echo $userData['joining_date']; ?></td>
                    <td><?php echo $userData['joining_time']; ?></td>
                    <form method="GET" action="delete_User.php" enctype="">
                        <input type="hidden" name="userid" id="userid" value="<?php echo $userData['user_id']; ?>"/>
                        <td><button type="submit" name="delete" id="delete" class="delete-button">Delete</button></td>
                    </form>
                    <form method="GET" action="edit_User_Password.php" enctype="">
                        <input type="hidden" name="userid" id="userid" value="<?php echo $userData['user_id']; ?>"/>
                        <td><button type="submit" name="edit" id="edit" class="edit-button">Change Password</button></td>
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