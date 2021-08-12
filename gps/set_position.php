<?php

//include 'connect_db.php';
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$lat= $_GET['lat'];
$lon= $_GET['lon'];
$deviceId= $_GET['id'];

echo " device .$deviceId  long= .$lon lat=.$lat" ;

$statement = $conn->prepare('INSERT INTO position (deviceId, latitue,longitude )
    VALUES (:deviceId, :lat, :lon)');

$statement->execute([
    'deviceId' => $deviceId,
    'lat' => $lat,
    'lon' => $lon,
]);

?>