<?php
$servername = "localhost";
$username = "id14019255_srimepco";
$password = "Harish12345+";
$dbname = "id14019255_sri";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
