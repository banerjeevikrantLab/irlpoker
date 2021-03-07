<?php
include "connect.php";

session_start();

$gamecode = $_SESSION["gamecode"];

$cards=array("AH", "2H", "3H", "4H", "5H", "6H", "7H", "8H", "9H", "10H", "JH", "QH", "KH", "AC", "2C", "3C", "4C", "5C", "6C", "7C", "8C", "9C", "10C", "JC", "QC", "KC","AS", "2S", "3S", "4S", "5S", "6S", "7S", "8S", "9S", "10S", "JS", "QS", "KS","AD", "2D", "3D", "4D", "5D", "6D", "7D", "8D", "9D", "10D", "JD", "QD", "KD");


// deal cards to the players

for($players = 1; $players <= 9; $players++){

    $playerCards = "";

    for($playerCard = 0; $playerCard < 2; $playerCard++){
        $rand = rand(0,count($cards)-1);
        if($playerCards != ""){
            $playerCards = $playerCards.",".$cards[$rand];
        }else{
            $playerCards = $cards[$rand];
        }
        unset($cards[$rand]);
        $cards = array_values($cards);
    }

    $playersString = "player".$players;

    $sqlcommand = "UPDATE game SET $playersString='$playerCards' WHERE `id`=$gamecode";
    $query = $conn->query($sqlcommand) or die(mysql_error());
}

// deal the community cards

$communitycards = "";

for($i = 0; $i < 5; $i++){
    $rand = rand(0,count($cards)-1);
    if($communitycards != ""){
        $communitycards = $communitycards.",".$cards[$rand];
    }else{
        $communitycards = $cards[$rand];
    }
    unset($cards[$rand]);
    $cards = array_values($cards);
}


$sqlcommand = "UPDATE game SET community='$communitycards' WHERE `id`=$gamecode";
$query = $conn->query($sqlcommand) or die(mysql_error());


?>