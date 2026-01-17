<?php

//connection.php

$db_hostname = 'localhost';
$db_database = 'COMP230_PROJECT';
$db_username = 'root';
$db_password = '';


$con = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);


if (!$con) {

die("Failed to connect to MySQL ".mysqli_connect_error());

}

?>