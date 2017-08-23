<?php
	session_start();
	if(empty($_SESSION["uname"]))
	{
		header("Location: Chieh-Huang Chen WIP Login.php");
	}
	$hostname = "fdb7.awardspace.net";
	$dbname = "1883894_efake";
	$uname = "1883894_efake";
	$pword = "";
	$conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname,$uname,$pword);
	
	$productquery=$_POST['productid'];
	$USERNAME= $_SESSION['uname'];
	$PRODUCTID = intval($productquery);
	
	$productcmd ="SELECT * FROM products WHERE ID = $PRODUCTID";
	$usercmd = "SELECT * FROM accounts WHERE Username = '$USERNAME'";
	
	$statement =$conn -> prepare($productcmd);
	$statement->execute();
	$productinfo = $statement->fetch();
	
	$statement =$conn -> prepare($usercmd);
	$statement->execute();
	$userinfo = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$fname=$userinfo[0]["Fname"];
	$lname=$userinfo[0]["Lname"];
	$email=$userinfo[0]["Email"];
	$dobirth=$userinfo[0]["DoB"];
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
			span{text-align:relative;margin-left:10%}
			img{width:100px;}
			div{margin-left:10%;}
		</style>
		<script type = "text/javascript" src="Chieh-Huang Chen WIP JS TEXT.js"></script>
		<script>
		</script>
	</head>
	<body onload = "">
	<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
	<div>Create your personal account by filling out the form below.</div>
	<div>
		<form method = "post" action = "Chieh-Huang Chen WIPHP Finished Transaction.php">
		<?php
			echo "<input type ='hidden' name = 'productid' value = $PRODUCTID></input>";
			echo "First Name:<input type = 'text' name = 'fname' value = '$fname' disabled> </input></br>";
			echo "Last Name:<input type = 'text' name = 'lname' value = '$lname' disabled></input></br>";
			echo "Email:<input type = 'email' name = 'email' value = '$email' disabled></input></br>";
			echo "Date Of Birth:<input type = 'date' name = 'DOBirth' value = '$dobirth' disabled></input></br>";
			echo "<input type = 'hidden' name = 'fname' value = '$fname' ></input>";
			echo "<input type = 'hidden' name = 'lname' value = '$lname' ></input>";
			echo "<input type = 'hidden' name = 'email' value = '$email' ></input>";
			echo "<input type = 'hidden' name = 'DOBirth' value = '$dobirth' ></input>";
		?>
			Address: <input type ='text' pattern ="^[A-za-z0-9\s\-\_]*$" name = 'address' autocomplete="off" required></input></br>
			Postal Code: <input type ='text' pattern ="^[0-9\-]{5,}" name = 'postal' autocomplete="off" title="Your postal code should have at least 5-digits." required></input></br>
			City: <input type = 'text' pattern = "^[a-zA-Z\s]*$" name = 'city' autocomplete="off" required></input></br>
			State: <input type = 'text' pattern = "^[a-zA-Z\s]*$" name = 'state' autocomplete="off" required></input></br>
			Country: <input type = 'text' pattern ="^[A-Za-z\s]*$" name='country' autocomplete="off" required></input></br>
			Credit Card: </br>
			<label for ="card1"><input id ="card1" type = "radio" name = "ccard" value="PayPal" checked ="checked"><img src ="paypal.png"></img></label>
			<label for ="card2"><input id ="card2" type = "radio" name = "ccard" value="MasterCard"><img src ="mastercard.png"></img></label>
			<label for ="card3"><input id ="card3" type = "radio" name = "ccard" value="Visa"><img src ="visa.png"></img></input></label>
			<label for ="card4"><input id ="card4" type = "radio" name = "ccard" value="American Express"><img src ="americanexpress.png"></img></label>
			<label for ="card5"><input id ="card5" type = "radio" name = "ccard" value="Discover"><img src ="discover.jpg"></img></label></br>
			Credit Card Number:<input type = "text" name = "ccnumber" pattern = "^[0-9]{16}" title ="Your Credit Card Number should have 16-digits." autocomplete="off" required></input></br>
			CVV:<input type = "text" name = "cvv" pattern ="^[0-9]{3,4}" title = "CVV stands for Card Verification Value." autocomplete="off" required></input></br>
			Card Expiration Date: <input type = "month" name = "cexpire" autocomplete="off" required></input>
			<input type = "submit" style = "margin-bottom:10%;"id = "submit"></input>
		</form>
	</div>
	</body>
</html>