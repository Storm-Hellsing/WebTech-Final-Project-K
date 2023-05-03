<?php

    require_once("../models/db_connection.php");
    require_once("../models/validations.php");

    #Find Product Type
    function find_product_type_general()
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_type`";
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------------------

    #Fetch Product Type
    function fetch_product_type_general()
    {
        $connected = setConnection();
        $sql = "SELECT * FROM `product_type`";

        return mysqli_query($connected, $sql);
    }

?>