<?php
include "connect.php";

session_start();

if(isset($_SESSION['gamecode'])){
    $gamecode = $_SESSION["gamecode"];
    $yourid = $_SESSION["id"];

    if($yourid == 0){
        header("Location: game.php"); 
        exit();
    }
    $playernum = $_SESSION["playernum"];
    $name = $_SESSION["name"];

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
#cardsdiv{
    margin: auto;
    width: 355px;
    border: 3px solid #73AD21;
    padding: 10px;
    margin-top: 50px;
}
</style>

</head>

<body style="background-color:#4b9b48">
<div id="cardsdiv">
</div>

<script>

var card1Last = "a";
var card2Last = "b";

$( document ).ready(function() {


    setInterval(function() {
        
        $.post("checkcards.php", {player: "<?php echo 'player'.$playernum ?>"}, function(result){
            var cards = result;
            console.log(result);

            var cardsRes = cards.split(",");

            var card1 = cardsRes[0];
            var card2 = cardsRes[1];

            if(card1.localeCompare(card1Last) != 0 || card2.localeCompare(card2Last) != 0) {
                var img1 = $('<img class="dynamic">');
                img1.attr('src', "cards/"+card1+".png");
                img1.attr('height', "250px");
                $("#cardsdiv").html(img1);

                var img2 = $('<img class="dynamic">');
                img2.attr('src', "cards/"+card2+".png");
                img2.attr('height', "250px");
                img2.appendTo('#cardsdiv');
            }

            card1Last = card1;
            card2Last = card2;

        });
    }, 500);
});

</script>

</body>
</html>