<?php
include "connect.php";

session_start();

$gamecode = $_SESSION["gamecode"];

$player = isset($_POST['player']) ? $_POST['player']: null;
$card = isset($_POST['card']) ? $_POST['card']: null;
$cardnum = isset($_POST['cardnum']) ? $_POST['cardnum']: null;

$cardString = ','.$card;
$playersNumString = "player".$player;

if($cardnum == '0'){
    $sqlcommand = "UPDATE game SET $playersNumString='$card' WHERE `gameid`=$gamecode";
    $query = $conn->query($sqlcommand) or die(mysql_error());
}
else{
    $sqlcommand = "UPDATE game SET $playersNumString=CONCAT($playersNumString, '$cardString') WHERE `gameid`=$gamecode";
    $query = $conn->query($sqlcommand) or die(mysql_error());
}

?>