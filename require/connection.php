<?php 

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

// $serverName = $dbparts['host'];
// $userName = $dbparts['user'];
// $password = $dbparts['pass'];
// $dbName = ltrim($dbparts['path'],'/');

$serverName = "localhost";
$email = "root";
$username = "root";
$fullname = "root";
$password = "root";
$dbName = "CoffeeLoveApp";

$connect = new mysqli($serverName, $email, $username, $fullname, $password, $dbName);

if ($connect -> connect_error) {
	die("Connection failed: " . $connect -> connect_error);
}



?>