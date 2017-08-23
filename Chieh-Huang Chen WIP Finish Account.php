<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<style>
			body{background-image:url('upfeathers.png');display:inline-block;font-size:30px;margin-left:30%;}
			.eFake{font-size:100px;font-family:impact;font-style:italic;font-weight:bold;color:red;}
			sub{color:green;}
			input{font-size:25px;font-size:30px;text-align:relative;margin-left:2%;}
			span{text-align:relative;margin-left:0%}
			#submit{margin-left:40%}
			.verytop{border:solid;background-color:lightgrey;text-align:right;font-size:25px;}
			.verytop>span{margin-left:0%;}
		</style>
		<script>
			function loggingout(){document.getElementById("logout").form.submit()}
		</script>
		<?php
			$fname=$_POST["FName"];
			$lname=$_POST["LName"];
			$email=$_POST["Email"];
			$gender=$_POST["Gender"];
			$dobirth=$_POST["DOBirth"];
			$username=$_POST["Username"];
			$password=$_POST["Password"];
			
			$dobirthchanged = date("Y-m-d",strtotime($dobirth));
			
			$hostname = "fdb7.awardspace.net";
			$dbname = "1883894_efake";
			$uname = "1883894_efake";
			$pword = "";
			$conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname,$uname,$pword);
			$insertcmd = "INSERT INTO accounts(`Fname`	, `Lname`, `Email`, `Gender`, `DoB`, `Username`, `Password`) VALUES ('$fname','$lname','$email','$gender','$dobirthchanged','$username','$password');";
			$statement = $conn->prepare($insertcmd);
			$statement->execute();
			$_SESSION['uname']=$username;
		?>
	</head>
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
				echo "<form method = 'post' action = 'index.php'><input type = 'hidden' id = 'logout' name='loggingout' value='out'></input><div class = 'verytop'><span>Hello, $loggedname!</span>|<span><a style ='color:blue;text-decoration:underline;' onclick='loggingout()'>Logout</a></form></span></div>";
			}
			else
			{
				header("Location: Chieh-Huang Chen WIP index.php");
			}
	?>
	<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
	<?php
		echo "Your account has been successfully created!";
	?>
	<script>
	</script>
</html>