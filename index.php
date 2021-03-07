<?php
include "connect.php";

session_start();

/*
if(isset($_SESSION['gamecode'])){
    $id = $_SESSION["id"];

    if($id == 0){
        header("Location: gamepage.php"); 
        exit();
    }else{
        header("Location: game.php"); 
        exit();
    }

}else{
    header("Location: index.php"); 
    exit();
}
*/

if(isset($_POST['gamepin'])){
    $gamepin = $_POST['gamepin'];

    $sqlcommand = "INSERT INTO `game` (`gamepin`, `players`) VALUES ($gamepin, 1)";
    $query = $conn->query($sqlcommand) or die(mysql_error());
    $gamecode = $conn->insert_id;

    $_SESSION["gamecode"] = $gamecode;
    $_SESSION["id"] = 0;

    header("Location: gamepage.php"); /* Redirect browser */
    exit();

} else if(isset($_POST['name'])){
    $name = $_POST['name'];
    $gamecode = $_POST['gamecode'];
    $gamepin = $_POST['gamepin2'];

    $sqlcommand = "INSERT INTO `users` (`name`) VALUES ('$name')";
    $query = $conn->query($sqlcommand) or die(mysql_error());
    $yourId = $conn->insert_id;

    $sqlcommand = "SELECT * FROM game WHERE `id`='$gamecode' AND `gamepin`='$gamepin'";
    $query = $conn->query($sqlcommand) or die(mysql_error());
    $count = $query->num_rows; 
	if ($count == 1) {
		$row = $query->fetch_assoc();
        $players = $row['players'];
        $newPlayers = $players + 1;
        $playersIdString = "player".$players."id";

        $sqlcommand = "UPDATE game SET $playersIdString='$yourId', `players`='$newPlayers' WHERE `id`=$gamecode";
        $query = $conn->query($sqlcommand) or die(mysql_error());

    }
    

    $_SESSION["gamecode"] = $gamecode;
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $yourId;
    $_SESSION['playernum'] = $players;

    header("Location: game.php"); /* Redirect browser */
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>

.btn{
    border-radius:28px;
	display:inline-block;
	cursor:pointer;
    font-weight:bold;
	color:#ffffff;
	font-family:Verdana;
	font-size:14px;
	padding:16px 31px;
	text-decoration:none;
    margin-top: 20px;
}
.btn:hover{
    color: white;
}

.btnstart {
	background-color:#44c767;
    border:2px solid #18ab29;
    margin-left: 25px;
}
.btnstart:hover {
	background-color:#5cbf2a;
}
.btnstart:active {
	position:relative;
	top:1px;
}
.btnjoin {
	background-color:#faaa55;
	border:2px solid #f59520;
    margin-left: 5px;
}
.btnjoin:hover {
	background-color:#f0942b;
}
.btnjoin:active {
	position:relative;
	top:1px;
}

.header{
    position: relative;
    background-color: #205821;
    height: 70px;
}

.title{
    color: white;
    font-size: 43px;
    font-family: Verdana;
    padding: 30px;
}

.form{
    margin-left: 30px;
    margin-top: 10px;
}
       
</style>
</head>

<body>

<div class="">
    <div class="header">
        <span class="title">irlpoker.net</span>
    </div>

    <button href="#" class="btn btnstart" id="btnstart">Start New Game</button>
    <button href="#" class="btn btnjoin" id="btnjoin">Join a Game</button>

    <div class="form form-start" style="display: none;">
        <form action="#" method="POST" class="m-auto" style="max-width:600px">
            <h3 class="my-4">welcome to IRLPoker</h3>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="gamepin" class="col-md-5 col-form-label">gamepin</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="gamecode2" name="gamepin" required><small class="form-text text-muted"> create 6 digits pin</small></div>
            </div>
            <div class="form-group mb-3 row"><label for="-players4" class="col-md-5 col-form-label"># players</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="-players4" name="players" required><small class="form-text text-muted"> max 9</small></div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="join7" class="col-md-5 col-form-label"></label>
                <div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">start</button></div>
            </div>
        </form>
    </div>

    <div class="form form-join" style="display: none;">
        <form class="m-auto" action="#" method="POST" style="max-width:600px">
            <h3 class="my-4">welcome to IRLPoker</h3>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="your-name2" class="col-md-5 col-form-label">your name</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="your-name2" name="name" required></div>
            </div>
            <div class="form-group mb-3 row"><label for="gamecode3" class="col-md-5 col-form-label">gamecode</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="gamecode3" name="gamecode" required><small class="form-text text-muted"> 6 digits code</small></div>
            </div>
            <div class="form-group mb-3 row"><label for="personal-passcode5" class="col-md-5 col-form-label">gamepin</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="personal-passcode5" name="gamepin2" required><small class="form-text text-muted"> 6 digits pin</small></div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="join8" class="col-md-5 col-form-label"></label>
                <div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">join</button></div>
            </div>
        </form>
    </div>
</div>


<script>


$('#btnstart, #btnjoin').click(function () {
    if (this.id == 'btnstart') {
        $(".form-join").hide();
        $(".form-start").show();
    }
    else if (this.id == 'btnjoin') {
        $(".form-start").hide();
        $(".form-join").show();
    }
});

</script>
</body>


</html>