<?php
/*
$server = "localhost";
$username = "root";
$password = "";
$database = "menshop";
*/

$server = "dbmat.cmeypdk92ow4.us-west-2.rds.amazonaws.com";
$username = "dbmat";
$password = "mat12345";
$database = "menshop";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
