<?php

    function setConnection()
    {
        $localHost = "127.0.0.1";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "ecommerce_marketplace";

        return mysqli_connect($localHost, $dbUser, $dbPass, $dbName);
    }

    function sqlReadQuery($sql)
    {
        $connected = setConnection();
        $result = mysqli_query($connected, $sql);

        return mysqli_num_rows($result);
    }

    function sqlWriteQuery($sql)
    {
        $connected = setConnection();
        return mysqli_query($connected, $sql);
    }

    function getTableData($sql)
    {
        $connected = setConnection();
        return mysqli_query($connected, $sql);
    }

?>
