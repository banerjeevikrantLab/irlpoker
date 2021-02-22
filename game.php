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
}
.btngo:hover {
	background-color:#f0942b;
}
.btngo:active {
	position:relative;
	top:1px;
}
</style>
</head>

<body style="background-color:#4b9b48">
<h3 class="my-4" style="color:white">poker table</h3>
<hr class="my-4" />

<button href="#" class="btngo" id="btngo">flop</button>

<div id="cardsdiv">

</div>


<script>
var cards = ["AH", "2H", "3H", "4H", "5H", "6H", "7H", "8H", "9H", "10H", "JH", "QH", "KH", 
             "AC", "2C", "3C", "4C", "5C", "6C", "7C", "8C", "9C", "10C", "JC", "QC", "KC",
             "AS", "2S", "3S", "4S", "5S", "6S", "7S", "8S", "9S", "10S", "JS", "QS", "KS",
             "AD", "2D", "3D", "4D", "5D", "6D", "7D", "8D", "9D", "10D", "JD", "QD", "KD"];
var turn = 0;
var cardsShown = [];

$( document ).ready(function() {
    $('#btngo').click(function () {

        if(turn == 0){
            for(var i = 0; i < 3; i++){
                addCard(cards[randCard()]);
            }
            $("#btngo").html('turn');
            turn++
        } else if(turn < 3){
            addCard(cards[randCard()]);
            turn++;
            if(turn == 2){
                $("#btngo").html('river');
            }else{
                $("#btngo").html('new round');
            }
        }
        else {
        }

    });

    function randCard(){
        
        var card = uniqueRand();
        
        cardsShown.push(card);
        return card;
    }

    function uniqueRand(){
        var rand = Math.floor(Math.random() * 5);
        if (rand in cardsShown) {
            return 12;
        } else {
            return rand;
        }
    }
    
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