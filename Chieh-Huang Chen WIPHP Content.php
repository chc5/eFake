<?php
	session_start();
	if(isset($_POST["loggingout"]))
	{
		unset($_SESSION["uname"]);
		unset($_POST['logout']);
	}
	
	$querystring = $_POST['searchquery'];
	$querystring = explode(" ",$querystring);
	$hostname = "fdb7.awardspace.net";
	$dbname = "1883894_efake";
	$uname = "1883894_efake";
	$pword = "";
	$conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname,$uname,$pword);
?>
<!DOCTYPE HTML>
<!-- Chieh-Huang Chen -->
<html>
	<head>
		<title>
		</title>
		<style>
			body{background-image:url('upfeathers.png');display:inline-block;font-size:40px;margin-left:20%;margin-right:20%;}
			.eFake{font-size:100px;font-family:impact;font-style:italic;font-weight:bold;color:red;}
			sub{color:green;}
			input{font-size:25px;font-size:25px;text-align:relative;margin-left:10%;}
			span{text-align:relative;margin-left:10%;display:inline-block;}
			a{color:blue;text-decoration: underline;}
			form{margin: 0; padding: 0;}
			.verytop{border:solid;background-color:lightgrey;text-align:right;font-size:25px;}
			.verytop>span{margin-left:0%;}
			img{height:250px;}
		</style>
	</head>
	<script>
	function loggingout(){document.getElementById("logout").form.submit()}
	function submit0(){document.getElementById("form0").form.submit()}
	function submit1(){document.getElementById("form1").form.submit()}
	function submit2(){document.getElementById("form2").form.submit()}
	function submit3(){document.getElementById("form3").form.submit()}
	function submit4(){document.getElementById("form4").form.submit()}
	function submit5(){document.getElementById("form5").form.submit()}
	function submit6(){document.getElementById("form6").form.submit()}
	function submit7(){document.getElementById("form7").form.submit()}
	function submit8(){document.getElementById("form8").form.submit()}
	function submit9(){document.getElementById("form9").form.submit()}
	</script>
	<body>
	<?php
			if(isset($_SESSION["uname"]))
			{
				$username = $_SESSION["uname"];
				$cmd = "SELECT * FROM accounts WHERE Username = '$username'";
				$statement =$conn -> prepare($cmd);
				$statement->execute();
				$loggedinfo = $statement->fetchAll(PDO::FETCH_ASSOC);
				$loggedname=$loggedinfo[0]["Fname"]." ".$loggedinfo[0]["Lname"];
					echo "<form method = 'post' action = 'index.php'><div class = 'verytop'><span>Hello, $loggedname!</span>|<span><input type = 'hidden' id = 'logout' name='loggingout' value='out'></input><a style ='color:blue;text-decoration:underline;' onclick='loggingout()'>Logout</a></form></span></div>";			}
			else
			{
				echo "<div class = 'verytop'><a href = 'Chieh-Huang Chen WIP Creating Account.php'>Register</a>|<a href='Chieh-Huang Chen WIP Login.php'>Login</a></form></div>";
			}
	?>
	<form method = "post" action = "Chieh-Huang Chen WIPHP Content.php">
		<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
		<input type ="search" name ="searchquery" id = "textinput" placeholder="Search..."></input>
	</form>
	<?php
	$toten = 0;
	$i=0;
	for($a=0;$a<count($querystring);$a++)
	{
		$currentquery = "%".$querystring[$a]."%";
		$searchcmd = "SELECT * FROM products WHERE Name LIKE '$currentquery' OR Type LIKE '$currentquery' OR Description LIKE '$currentquery'";
		$statement = $conn->prepare($searchcmd);
		$statement->execute();
		$data=$statement->fetchAll(PDO::FETCH_ASSOC);
		$datarows = $statement -> rowCount();
		for($nx=$i;$nx<$datarows;$nx++)
		{
			if(empty($data[$nx]))
				break;
			$dataimg = $data[$nx]["Image"] . ".PNG";
			$dataname = $data[$nx]["Name"];
			$dataid = $data[$nx]["ID"];
			$datadesc = $data[$nx]["Description"];
			$formid = "form".$nx;
			$submitfunction = "submit".$nx."()";
			$datadescarray = explode(";",$datadesc);
			echo "<form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'>";
			echo "<input type = 'hidden' id='$formid' name='productid' value='$dataid'>";
			echo "<div style='margin-top:5%;margin-bottom:5%;' onclick = '$submitfunction'>";
			echo "<span style='width:20%;'>";
			echo "<img src='$dataimg'/>";
			echo "</span><span style='width:60%;'>";
			echo "<div>$dataname</div></br>";
			for($y=0;$y<count($datadescarray);$y++)
				echo "<li style = 'font-size:20px'>$datadescarray[$y]</li>";
			echo "</span>";
			echo "</div>";
			echo "</form>";
		}
	}
	?>
	</body>
</html>