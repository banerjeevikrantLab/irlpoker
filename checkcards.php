<?php

$servername = "localhost";
$username1 = "newuser";
$password = "password";
$dbname = "irlpoker";

// Create connection
$conn = new mysqli($servername, $username1, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

session_start();

$gamecode = $_SESSION["gamecode"];
$passcode = $_SESSION["passcode"];
$player = isset($_POST['player']) ? $_POST['player']: null;


$sqlcommand = "SELECT * FROM game WHERE `gameid`=$gamecode";
$query = $conn->query($sqlcommand) or die(mysql_error());
$count = $query->num_rows; 
if ($count == 1) {
    $row = $query->fetch_assoc();
    $cards = $row[$player];
    
} 

echo $cards;

?>