<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<style>
			body{background-image:url('upfeathers.png');display:inline-block;font-size:30px;margin-left:30%;text-align:center;}
			.eFake{font-size:100px;font-family:impact;font-style:italic;font-weight:bold;color:red;}
			sub{color:green;}
			input{font-size:25px;font-size:30px;text-align:relative;margin-left:2%;}
			span{text-align:relative;margin-left:0%}
		</style>
		<script>
		</script>
	</head>
	<body>
	<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
	<div>
	<?php
		if(isset($_SESSION["loginfailed"]))
		{
			unset($_SESSION["loginfailed"]);
			echo "<div>Invalid Username or Password.</div>";
		}
	?>
	<form method ="post" action="index.php">
		Username:<input type="text" name ="userlogin"></input></br>
		Password:<input type="password" name ="pwordlogin" autocomplete="off"></input></br>
		<input type ="submit" value="Login"></input></br>
	</form>
	</div>
	<script>
	</script>
</html>