<?php

$server			= "localhost";
$user 			= "root";
$password 		= "";
$database 		= "warungbangudin";

$connect= mysqli_connect($server, $user, $password, $database);

if( !$connect){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}



?>

