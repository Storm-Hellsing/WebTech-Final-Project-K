<?php

require_once("../models/sql_connection.php");

$sql = "SELECT * FROM `user_all`";
$result = getData($sql);

if($result)
{
    echo 1;
    while($userData = mysqli_fetch_assoc($result))
    {
        print_r($result);
        echo "<br>";
        echo($userData['user_id']);
    }

}
else
{
    echo 0;
}


?>