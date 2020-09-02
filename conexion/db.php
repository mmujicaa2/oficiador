<?php
// datos para la conexion a mysql
$DB_SERVER="127.0.0.1";
$DB_NAME="oficios";
$DB_USER="root";
$DB_PASS="";
 
 $conn = mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS);
    mysqli_select_db($conn,$DB_NAME);
    mysqli_set_charset($conn, "utf8")
 
?>