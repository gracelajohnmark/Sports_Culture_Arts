<?php
/* Improved database connection code */
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'skcinventory';

try {
    $CON = mysqli_connect($db_host, $db_username, $db_password, $db_name);

} catch (mysqli_sql_exception) {
    echo "Your Offline";
}
if ($CON) {
}
?>