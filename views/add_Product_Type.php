<?php

    session_start();
    
    if(isset($_COOKIE['userLoggedIn']))
    {

    

?>

<html>
    <head>
        <title>Product Types</title>
    </head>

    <body>
        <form method="POST" action="../controllers/add_Product_Type_Check.php" enctype="">
        <div class="main-box">
            <h1>Add Product Types</h1>
            <label for="productype">Product Type:</label> <br/>
            <input type="text" name="productype" id="productype" value=""/>
            <br/> <br/>
            <input type="submit" name="submit" id="submit" value="Add"/>
        </div>

        <?php

            if(isset($_REQUEST['msg']))
            {
                if($_REQUEST['msg'] == 'nullInputs')
                {
                    echo("Please fill up all the fields");
                }
                elseif($_REQUEST['msg'] == 'productTypeNameExsists')
                {
                    echo("<b>The product type already exsists.</b>");
                }
                elseif($_REQUEST['msg'] == 'addSuccess')
                {
                    echo("<b>The Product Type has been addeed</b>");
                }
                elseif($_REQUEST['msg'] == 'addFailed')
                {
                    echo("<b>Could Not add Product Type.</b>");
                }
            }

        ?>
        </form>
    </body>
</html>

<?php

    }

?>