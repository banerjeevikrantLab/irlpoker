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

echo $_SESSION["gamecode"];
echo $_SESSION["name"];
echo $_SESSION["passcode"];

$gamecode = $_SESSION["gamecode"];
$passcode = $_SESSION["passcode"];

$sqlcommand = "SELECT * FROM users WHERE `passcode`=$passcode";
$query = $conn->query($sqlcommand) or die(mysql_error());
$count = $query->num_rows; 
if ($count == 1) {
    $row = $query->fetch_assoc();
    $playernum = $row['playernum'];
}


$sqlcommand = "SELECT * FROM game WHERE `gameid`=$gamecode";
$query = $conn->query($sqlcommand) or die(mysql_error());
$count = $query->num_rows; 
if ($count == 1) {
    $row = $query->fetch_assoc();
    $cards = $row['player'.$playernum];
    
} 

echo $cards;

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
<div id="cardsdiv">
</div>

<script>

var card1Last = "a";
var card2Last = "b";

$( document ).ready(function() {


    setInterval(function() {
        
        $.post("checkcards.php", {player: "<?php echo 'player'.$playernum ?>"}, function(result){
            var cards = result;

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
    }, 2000);
});

</script>

</body>
</html>