<?php
/*fixed, no need to debug */
    $db_host = "sql208.infinityfree.com";
    $user = "if0_37517235";
    $pass = "v1B59vfqNJVyr";
    $db_name = "if0_37517235_skcinventory";
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