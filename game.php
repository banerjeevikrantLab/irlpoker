<?php
include "connect.php";

session_start();

if(isset($_SESSION['gamecode'])){
    $gamecode = $_SESSION["gamecode"];
    $gameid = $_SESSION["id"];

    if($gameid != 0){
        header("Location: gamepage.php"); 
        exit();
    }
    $gamepin = $_SESSION["gamepin"];

}else{
    header("Location: index.php"); 
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
.btngo {
	background-color:#faaa55;
	border-radius:28px;
	border:2px solid #f59520;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Verdana;
	font-size:14px;
    font-weight:bold;
	padding:16px 31px;
	text-decoration:none;
    margin-left: 50px;
}
.btngo:hover {
	background-color:#f0942b;
}
.btngo:active {
	position:relative;
	top:1px;
}

.my-4{
    margin-left: 50px;
    margin-top: 30px;
    margin-right: 50px;
}

#cardsdiv{
    margin: auto;
    width: 875px;
    border: 3px solid #73AD21;
    padding: 10px;
    margin-top: 50px;
    height: 276px;
}
</style>
</head>

<body style="background-color:#4b9b48">
<h3 class="my-4" style="color:white">poker table</h3>
<hr class="my-4" />
<h6 class="my-4" style="color:white">gamecode: <?php echo $gamecode; ?>, gamepin: <?php echo $gamepin; ?></h6>
<hr class="my-4" />

<button href="#" class="btngo" id="btngo">start game</button>

<div id="cardsdiv">

</div>


<script>

var turn = 0;

$( document ).ready(function() {

    var communityCards = "";

    $('#btngo').click(function () {
        if(turn == 0) {
            $.post("dealcards.php", {}, function(result){
                communityCards = result.split(",");
            });
            turn++;
            $("#btngo").html("flop");
        }
        else if(turn == 1){
            addCard(communityCards[0]);
            addCard(communityCards[1]);
            addCard(communityCards[2]);
            turn++;
            $("#btngo").html("turn");
        }
        else if(turn == 2){
            addCard(communityCards[3]);
            turn++;
            $("#btngo").html("river");
        }else if(turn == 3){
            addCard(communityCards[4]);
            turn++
            $("#btngo").html("new game");
        }else if(turn == 4){
            location.reload();
        }

    });

    
    function addCard(card){

        var img = $('<img class="dynamic">');
        img.attr('src', "cards/"+card+".png");
        img.attr('height', "250px");
        img.appendTo('#cardsdiv');
    }
});
</script>
</body>

</html>