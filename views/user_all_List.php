<?php

    require_once("../models/db_connection.php");

    if(isset($_COOKIE['userLoggedIn']))
    {

?>

<html>
    <head>
        <title>User List</title>
    </head>
        
    <body>
        <div class="main-block">
            <h1 align="center">User List</h1>
            <a href="user_Admin_List.php" target="_blank">Admin's List</a>
            <a href="user_Customer_List.php" target="_blank">Customer's List</a>
            <a href="user_Merchant_List.php?" target="_blank">Merchant's List</a>
            <br/> <br/>
            <form method="GET" action="../controllers/user_all_List_Search_Check.php" target="_blank" enctype="">
            <label for="searchresult">Search User: </label>
            <input type="text" name="searchresult" id="searchresult" placeholder="Name/Email/Mobile" value=""/>
            <input type="submit" name="submit" id="submit" value="Search"/>  
            </form>
            <?php

                $sql = "SELECT * FROM `user_all` ORDER BY user_name ASC";
                $result = sqlReadQuery($sql);

                if($result > 0)
                {

            ?>
            <table align="center" border="1" width="1500px">
            <tr>
                <th width="25px">Serial No:</th>
                <th width="250px">User ID</th>
                <th width="250px">User Type</th>
                <th width="250px">User Name</th>
                <th width="250px">User Email</th>
                <th width="250px">User Mobile</th>
                <th width="250px">User's Business Name</th>
                <th width="250px">Business Link</th>
                <th width="250px">Joining Date</th>
                <th width="250px">Time</th>
                <th width="250px" colspan="2">Action</th>
                </tr>
                    
                
                <?php
                    
                    $sql = "SELECT `user_id`, `user_type`, `user_name`, `user_email`, `user_mobile`, `user_businessname`, `user_businesslink`, `joining_date`, `joining_time` 
                            FROM `user_all`";
                    $result = getTableData($sql);

                    if($result)
                    {
                        $count = 1;
                    
                        while($userData = mysqli_fetch_assoc($result))
                        {

                    ?>
                    <tr align="center">
                        <td><?php echo $count ?></td>
                        <td><?php echo $userData['user_id']; ?></td>
                        <td><?php echo $userData['user_type']; ?></td>
                        <td><?php echo $userData['user_name']; ?></td>
                        <td><?php echo $userData['user_email']; ?></td>
                        <td><?php echo isset($userData['user_mobile']) ? $userData['user_mobile'] : ''; ?></td>
                        <td><?php echo isset($userData['user_businessname']) ? $userData['user_businessname'] : ''; ?></td> <?php //Check whether the field for that specific row is empty ?>
                        <td><?php echo isset($userData['user_businesslink']) ? $userData['user_businesslink'] : ''; ?></td> <?php //Check whether the field for that specific row is empty ?>
                        <td><?php echo $userData['joining_date']; ?></td>
                        <td><?php echo $userData['joining_time']; ?></td>
                        <form method="GET" action="delete_User.php" enctype="">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $userData['user_id']; ?>"/>
                            <td><button type="submit" name="delete" id="delete">Delete</button></td>
                        </form>
                        <form method="GET" action="edit_User_Password.php" enctype="">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $userData['user_id']; ?>"/>
                            <td><button type="submit" name="edit" id="edit">Change Password</button></td>
                        </form>
                    </tr>
                    <?php 
                            $count++; 
                        }
                    }
                    ?>
            </table>

            <?php 

                }
                else
                {
                    echo("<b>The List is empty.</b>");
                }
            ?>

            </br> </br>
        </div>
        <?php

            if(isset($_REQUEST['msg']))
            {
                if($_REQUEST['msg'] == 'deletesuccess')
                {
                    echo("The user been deleted.");
                }
                elseif($_REQUEST['msg'] == 'deletefailed')
                {
                    echo("<b>Could Not delete user.</b>");
                }
            }

        ?>
    </body>
</html>

<?php

    }
    else
    {
        header('location: ../views/signIn.php');
    }

?>