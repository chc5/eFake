<?php
	session_start();
	
	$productid =$_POST["productid"];
	$fname =$_POST["fname"];
	$lname =$_POST["lname"];
	$email =$_POST["email"];
	$dobirth =$_POST["dobirth"];
	$address =$_POST["address"];
	$postal =$_POST["postal"];
	$city =$_POST["city"];
	$state =$_POST["state"];
	$country =$_POST["country"];
	$ccard =$_POST["ccard"];
	$ccnumber =$_POST["ccnumber"];
	$cvv =$_POST["cvv"];
	$cexpire =$_POST["cexpire"];
	
	$hostname = "fdb7.awardspace.net";
	$dbname = "1883894_efake";
	$uname = "1883894_efake";
	$pword = "";
	$conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname,$uname,$pword);
	
	$checkcmd = "SELECT * FROM accounts WHERE Username = '$userlogin' AND Password = '$pwordlogin'";
	$statement =$conn -> prepare($checkcmd);
	$statement->execute();
	$rows = $statement -> rowCount();
	
	$productid = intval($productid);
	$rows = intval($rows)+1;
	$cvv = intval($cvv);
	
	$dobirthchanged = date(strtotime($dobirth));
	$cexpirechanged = date(strtotime($cexpire."-01"));
	
	$insertcmd = "INSERT INTO `history`(`Transc_ID`, `Product_ID`, `First_Name`, `Last_Name`, `Email`, `Date_Of_Birth`, `Address`, `Postal_Code`, `City`, `State`, `Country`, `CC_Type`, `CC_Number`, `CVV`, `Card_Expire`) VALUES ($rows,$productid,'$fname','$lname','$email','$dobirthchanged','$address','$postal','$city','$state','$country','$ccard','$ccnumber','$ccv','$cexpirechanged')";
	$statement =$conn -> prepare($insertcmd);
	$statement->execute();
	
	$productcmd ="SELECT * FROM products WHERE ID = $productid";
	$statement =$conn -> prepare($productcmd);
	$statement->execute();
	$productinfo = $statement->fetch();
	
	$stocknumber = $productinfo['Stock'] - 1;
	$boughtnumber = $producinfo['Bought'] + 1;
	if($stocknumber == 0)
		$stocknumber =1;
	$stockcmd ="UPDATE products SET Stock = $stocknumber, Bought = $boughtnumber WHERE ID =$productid ";
	$statement =$conn -> prepare($stockcmd);
	$statement->execute();
?>
<!DOCTYPE HTML>
<!-- Chieh-Huang Chen -->
<html>
	<head>
		<title>
		</title>
		<style>
			body{background-image:url('upfeathers.png');display:inline-block;font-size:40px;margin-left:5%;}
			.eFake{font-size:100px;font-family:impact;font-style:italic;font-weight:bold;color:red;}
			sub{color:green;}
			input{font-size:25px;font-size:25px;text-align:relative;margin-left:10%;}
			span{text-align:relative;margin-left:10%;display:inline-block;}
			.verytop{border:solid;background-color:lightgrey;text-align:right;font-size:25px;}
			.verytop>span{margin-left:0%;}
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
				echo "<form method = 'post' action = 'index.php'><input type = 'hidden' id = 'logout' name='loggingout' value='out'></input><div class = 'verytop'><span>Hello, $loggedname!</span>|<span><a style ='color:blue;text-decoration:underline;' onclick='loggingout()'>Logout</a></form></span></div>";
			}
			else
			{
				header("Location: Chieh-Huang Chen WIP index.php");
			}
	?>
	<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
		<?php
			echo "<div>You have bought the following item:</div>";
			$productimg = $productinfo['Image'].".PNG";
			$productprice = intval($productinfo['Price']) - 0.01;
			$productdescarray = explode(";",$productinfo['Description']);
			
			echo "<input type = 'hidden' name='productid' value = '$productquery'></input>";
			echo "<span style='width:20%;'>";
			echo "<img src = '$productimg'></img>";
			echo "</span><span style = 'width:60%;'>";
			echo "$".$productprice."</br>";
			echo $productinfo['Name']."</br>";
			for($y=0;$y<count($productdescarray);$y++)
				echo "<li style = 'font-size:20px'>$productdescarray[$y]</li>";
			echo "</span>";
		?>
	</body>
</html>