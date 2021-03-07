<?php
include "connect.php";

session_start();

$gamecode = $_SESSION["gamecode"];

$player = isset($_POST['player']) ? $_POST['player']: null;


$sqlcommand = "SELECT * FROM game WHERE `id`=$gamecode";
$query = $conn->query($sqlcommand) or die(mysql_error());
$count = $query->num_rows; 
if ($count == 1) {
    $row = $query->fetch_assoc();
    $cards = $row[$player];
    
} 

echo $cards;

?>