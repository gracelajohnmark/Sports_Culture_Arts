<?php
/*fixed, no need to debug */
    $db_host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "skcinventory";
    $CON = "";

    try {
    $CON = mysqli_connect($db_host, $user, $pass, $db_name);

    }
    catch(mysqli_sql_exception){
        echo "Your Offline";
    }
        if($CON){
        }
?>    