<?php 
require 'require/connection.php';
require 'require/functions.php';

$result = get_all_info("SELECT * FROM 'coffeelovers'");

$result = $connect->query($sql);

if ($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
    }  
}else {
		echo "0  results";
}
$connect->close();


?>
