<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>

body{
    padding: 20px;
}
.btnstart {
	background-color:#44c767;
	border-radius:28px;
	border:2px solid #18ab29;
	display:inline-block;
	cursor:pointer;
    font-weight:bold;
	color:#ffffff;
	font-family:Verdana;
	font-size:14px;
	padding:16px 31px;
	text-decoration:none;
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
.btnjoin:hover {
	background-color:#f0942b;
}
.btnjoin:active {
	position:relative;
	top:1px;
}


       
</style>
</head>

<body>

<div class="container">
    <button href="#" class="btnstart" id="btnstart">Start New Game</button>
    <button href="#" class="btnjoin" id="btnjoin">Join a Game</button>

    <div id="form-start" style="display: none;">
        <form action="" class="m-auto" style="max-width:600px">
            <h3 class="my-4">welcome to IRLPoker</h3>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="gamecode2" class="col-md-5 col-form-label">gamecode</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="gamecode2" name="gamecode" required><small class="form-text text-muted"> 6 digits code</small></div>
            </div>
            <div class="form-group mb-3 row"><label for="-players4" class="col-md-5 col-form-label"># players</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="-players4" name="-players" required><small class="form-text text-muted"> max 9</small></div>
            </div>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="join7" class="col-md-5 col-form-label"></label>
                <div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">join</button></div>
            </div>
        </form>
    </div>

    <div id="form-join" style="display: none;">
        <form action="" class="m-auto" style="max-width:600px">
            <h3 class="my-4">welcome to IRLPoker</h3>
            <hr class="my-4" />
            <div class="form-group mb-3 row"><label for="your-name2" class="col-md-5 col-form-label">your name</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="your-name2" name="your-name" required></div>
            </div>
            <div class="form-group mb-3 row"><label for="gamecode3" class="col-md-5 col-form-label">gamecode</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="gamecode3" name="gamecode" required><small class="form-text text-muted"> 6 digits code</small></div>
            </div>
            <div class="form-group mb-3 row"><label for="personal-passcode5" class="col-md-5 col-form-label">personal passcode</label>
                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="personal-passcode5" name="personal-passcode" required><small class="form-text text-muted"> create any 6 digits code</small></div>
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
        $("#form-join").hide();
        $("#form-start").show();
    }
    else if (this.id == 'btnjoin') {
        $("#form-start").hide();
        $("#form-join").show();
    }
});

</script>
</body>


</html>