<?php

$db_host = "dbmat.cmeypdk92ow4.us-west-2.rds.amazonaws.com";
$db_user = "dbmat";
$db_pass = "mat12345";
$db_name = "pesbuk";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
