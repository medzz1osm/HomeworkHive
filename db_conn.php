<?php

$sname = "172.20.8.56";
$username = "root";
$password = "";
$db_port = 8889;

$db_name = "bruker_db";

$conn = mysqli_connect($sname, $username, $password, $db_name, $db_port);

if(!$conn) {
    echo "Connection failed!";

}