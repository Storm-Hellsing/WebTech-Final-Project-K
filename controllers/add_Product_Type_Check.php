<?php

    require_once("../models/db_connection.php");
    require_once("../models/validations.php");
    session_start();

    if(isset($_REQUEST['submit']))
    {
        $productTypeName = $_REQUEST['productype'];

        #sql Query
        $sql = "SELECT * FROM `product_type` WHERE `product_type_name`= '{$productTypeName}'";
        $productTypeName_Found = sqlReadQuery($sql);

        if($productTypeName == "")
        {
            header('location: ../views/add_Product_Type.php?msg=nullInputs');
        }
        elseif($productTypeName_Found)
        {
            header('location: ../views/add_Product_Type.php?msg=productTypeNameExsists');
        }
        else
        {
            $productType_Code = setProductTypeCode();
            $sql = "INSERT INTO `product_type`(`product_type_id`, `product_type_name`) 
            VALUES ('{$productType_Code}','{$productTypeName}')";
            $result = sqlWriteQuery($sql);

            if($result)
            {
                header('location: ../views/add_Product_Type.php?msg=addSuccess');
            }
            else
            {
                header('location: ../views/add_Product_Type.php?msg=addFailed');
            }
        }

?>



<?php

    }

?>