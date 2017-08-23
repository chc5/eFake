<?php
	session_start();
	$hostname = "fdb7.awardspace.net";
	$dbname = "1883894_efake";
	$uname = "1883894_efake";
	$pword = "";
	$conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname,$uname,$pword);
	
	$productquery=$_POST['productid'];
	$PRODUCTID = intval($productquery);
	
	$productcmd ="SELECT * FROM products WHERE ID = $PRODUCTID";
	$statement =$conn -> prepare($productcmd);
	$statement->execute();
	$productinfo = $statement->fetch();
	
	$visitnumber = $productinfo['Visited'] +1;
	$visitcmd ="UPDATE products SET Visited = $visitnumber WHERE ID =$PRODUCTID";
	$statement =$conn -> prepare($visitcmd);
	$statement->execute();
?>
<!DOCTYPE HTML>
<!-- Chieh-Huang Chen -->
<html>
	<head>
		<title>
		</title>
		<style>
			body{background-image:url('upfeathers.png');display:inline-block;font-size:40px;margin-left:10%;margin-right:10%;}
			.eFake{font-size:100px;font-family:impact;font-style:italic;font-weight:bold;color:red;}
			sub{color:green;}
			input{font-size:25px;font-size:25px;text-align:relative;margin-left:10%;}
			span{text-align:relative;margin-left:10%;display:inline-block;}
			form{margin: 0; padding: 0;}
			.verytop{border:solid;background-color:lightgrey;text-align:right;font-size:25px;}
			.verytop>span{margin-left:0%;}
			img{height:250px;}
		</style>
		<script>
		function loggingout(){document.getElementById("logout").form.submit()}
		</script>
	</head>
	<body onload = "">
	<?php
			if(isset($_SESSION["uname"]))
			{
				$username = $_SESSION["uname"];
				$cmd = "SELECT * FROM accounts WHERE Username = '$username'";
				$statement =$conn -> prepare($cmd);
				$statement->execute();
				$loggedinfo = $statement->fetchAll(PDO::FETCH_ASSOC);
				$loggedname=$loggedinfo[0]["Fname"]." ".$loggedinfo[0]["Lname"];
				echo "<form method = 'post' action = 'index.php'><div class='verytop'><span>Hello, $loggedname!</span>|<span><input type = 'hidden' id = 'logout' name='loggingout' value='out'></input><a style ='color:blue;text-decoration:underline;' onclick='loggingout()'>Logout</a></span></div></form>";
			}
			else
			{
				echo "<div class='verytop'><a href = 'Chieh-Huang Chen WIP Creating Account.php'>Register</a>|<a href='Chieh-Huang Chen WIP Login.php'>Login</a></form></div>";
			}
	?>
	<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
	<?php
		$productimg = $productinfo['Image'].".PNG";
		$productprice = intval($productinfo['Price']) - 0.01;
		$productdescarray = explode(";",$productinfo['Description']);
		
		echo "<form method='post' action= 'Chieh-Huang Chen WIPHP Ordering.php'>";
		echo "<input type = 'hidden' name='productid' value = '$productquery'></input>";
		echo "<span style='width:20%;'>";
		echo "<img src = '$productimg'></img>";
		echo "</span><span style = 'width:60%;'>";
		echo "<input type = 'submit' value ='BUY NOW'></input></br>";
		echo "$".$productprice."</br>";
		echo $productinfo['Name']."</br>";
		for($y=0;$y<count($productdescarray);$y++)
			echo "<li style = 'font-size:20px'>$productdescarray[$y]</li>";
		echo "</span></form>";
	?>
	</body>
</html>