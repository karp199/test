<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "karty_graficzne";

$connection = mysqli_connect( $host, $user, $pass, $db );
$connection->query( 'SET NAMES UTF8' );

?>
