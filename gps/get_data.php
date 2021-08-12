<?php

//include 'connect_db.php';
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Connected successfully";
} catch(PDOException $e) {
 // echo "Connection failed: " . $e->getMessage();
}



$stmt = $conn->query("SELECT * FROM position");
/*
$stmt->execute();
$result=$stmt;
foreach($result as $row){
  echo $result['id'];
}
*/
$positions = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($positions) {
	// show the publishers
	foreach ($positions as $position) {
		echo $position['id'] . '<br>';
	}
}



?>