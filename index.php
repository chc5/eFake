<?php
	session_start();
	
			$hostname = "fdb7.awardspace.net";
			$dbname = "1883894_efake";
			$uname = "1883894_efake";
			$pword = "";
			$conn = new PDO("mysql:host=".$hostname.";dbname=".$dbname,$uname,$pword);
			$hotcmd ="SELECT Image,ID FROM products ORDER BY Bought DESC";
			$newcmd ="SELECT Image,ID FROM products ORDER BY Stock DESC";
			$almostoutcmd = "SELECT Image,ID FROM products ORDER BY Stock";
			$freqcmd = "SELECT Image,ID FROM products ORDER BY Visited DESC";
			$cheapcmd = "SELECT Image,ID FROM products ORDER BY Price";
			
			if(isset($_POST['userlogin']))
			{
				$userlogin = $_POST['userlogin'];
				$pwordlogin = $_POST['pwordlogin'];
				$logcmd = "SELECT * FROM accounts WHERE Username = '$userlogin' AND Password = '$pwordlogin'";
				$statement =$conn -> prepare($logcmd);
				$statement->execute();
				$logginginfo = $statement-> fetchAll(PDO::FETCH_ASSOC);
				$logname=$logginginfo[0]["Fname"]." ".$logginginfo[0]["Lname"];
				$rows = $statement -> rowCount();
				if($rows > 0)
				{
					$_SESSION["uname"]=$userlogin;
				}
				else
				{
					unset($_POST['userlogin']);
					header("Location: Chieh-Huang Chen WIP Login.php");
					$_SESSION["loginfailed"] = "wrong";
					die();
				}
			}
			if(isset($_POST["loggingout"]))
			{
				unset($_SESSION["uname"]);
				unset($_POST['logout']);
			}
?>
<!DOCTYPE HTML>
<!--Chieh-Huang Chen -->
<html>
	<head>
		<style>
			body{background-image:url('upfeathers.png');display:inline-block;font-size:25px;margin-left:20%;margin-right:20%;}
			.eFake{font-size:100px;font-family:impact;font-style:italic;font-weight:bold;color:red;}
			sub{color:green;}
			.titles{font-weight:bold;font-size:50px;font-family:georgia;}
			input{font-size:25px;text-align:relative;}
			a{color:blue;text-decoration: underline;font-size:25px;}
			form{margin: 0; padding: 0;}
			.verytop{border:solid;background-color:lightgrey;text-align:right;}
			td{align:bottom;}
			img{width:250px;}
		</style>
		<title>eFake: Online Shopping for Electronic Parts</title>
	<script>
	function returndochotsrc0(){document.getElementById("hot0").form.submit()}
	function returndochotsrc1(){document.getElementById("hot1").form.submit()}
	function returndochotsrc2(){document.getElementById("hot2").form.submit()}
	function returndocnewsrc0(){document.getElementById("new0").form.submit()}
	function returndocnewsrc1(){document.getElementById("new1").form.submit()}
	function returndocnewsrc2(){document.getElementById("new2").form.submit()}
	function returndocfreqsrc0(){document.getElementById("freq0").form.submit()}
	function returndocfreqsrc1(){document.getElementById("freq1").form.submit()}
	function returndocfreqsrc2(){document.getElementById("freq2").form.submit()}
	function returndocoutsrc0(){document.getElementById("out0").form.submit()}
	function returndocoutsrc1(){document.getElementById("out1").form.submit()}
	function returndocoutsrc2(){document.getElementById("out2").form.submit()}
	function returndoccheapsrc0(){document.getElementById("cheap0").form.submit()}
	function returndoccheapsrc1(){document.getElementById("cheap1").form.submit()}
	function returndoccheapsrc2(){document.getElementById("cheap2").form.submit()}
	function loggingout(){document.getElementById("logout").form.submit()}
	</script>
	</head>
	<body>
		<!--UNFINISHED AND NEED ONCLICK TO VIEW INFO -->
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
				echo "<div class = 'verytop'><a href = 'Chieh-Huang Chen WIP Creating Account.php'>Register</a>|<a href='Chieh-Huang Chen WIP Login.php'>Login</a></form></div>";
			}
		?>
		<!-- Top -->
		<?php
		?>
		<div>
		<form method = "post" action = "Chieh-Huang Chen WIPHP Content.php">
		<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
		<input type ="search" name ="searchquery" id = "textinput" placeholder="Search..."></input>
		</form>
		</div>
		<!-- Types -->
		<div>
		</div>
		<!-- Hot Sales -->
		<div class = "titles">
			Hottest Sales
		</div>
		<div id = "hottable">
		<table>
			<tr>
				<?php
				$statement = $conn->prepare($hotcmd);
				$statement->execute();
				//$data=$statement->fetchAll(PDO::FETCH_ASSOC);
				$hotdata0=$statement->fetch();
				$hotdataimg0 = $hotdata0[0] .".PNG";
				$hotdata1 =$statement->fetch();
				$hotdataimg1 = $hotdata1[0] .".PNG";
				$hotdata2 =$statement->fetch();
				$hotdataimg2 = $hotdata2[0] .".PNG";
				
				$documentsrc0 = "document.getElementById('hot1')";
				
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'hot0' name='productid' value='$hotdata0[1]'></input><img onclick='returndochotsrc0()' src = '$hotdataimg0'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'hot1' name='productid' value='$hotdata1[1]'></input><img onclick='returndochotsrc1()' src = '$hotdataimg1'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'hot2' name='productid' value='$hotdata2[1]'></input><img onclick='returndochotsrc2()' src = '$hotdataimg2'/></form></td>";
				?>
			</tr>
		</table>
		</div>
		<!-- New Sales -->
		<div class = "titles">
			Newest Sales
		</div>
		<div id ="newtable">
		<table>
			<tr>
				<?php
				$statement = $conn->prepare($newcmd);
				$statement->execute();
				$newdata0=$statement->fetch();
				$newdataimg0 = $newdata0[0] .".PNG";
				$newdata1 =$statement->fetch();
				$newdataimg1 = $newdata1[0] .".PNG";
				$newdata2 =$statement->fetch();
				$newdataimg2 = $newdata2[0] .".PNG";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'new0' name='productid' value='$newdata0[1]'></input><img onclick='returndocnewsrc0()' src = '$newdataimg0'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'new1' name='productid' value='$newdata1[1]'></input><img onclick='returndocnewsrc1()' src = '$newdataimg1'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'new2' name='productid' value='$newdata2[1]'></input><img onclick='returndocnewsrc2()' src = '$newdataimg2'/></form></td>";
				?>
			</tr>
		</table>
		</div>
		<div class ="titles">
			Hurry! Almost Out Of Stock!
		</div>
		<div id ="frequtable">
		<table>
			<tr>
				<?php
				$statement = $conn->prepare($almostoutcmd);
				$statement->execute();
				//$data=$statement->fetchAll(PDO::FETCH_ASSOC);
				$outdata0=$statement->fetch();
				$outdataimg0 =  $outdata0[0] .".PNG";
				$outdata1 =$statement->fetch();
				$outdataimg1 =  $outdata1[0] .".PNG";
				$outdata2 =$statement->fetch();
				$outdataimg2 = $outdata2[0] .".PNG";
				
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'out0' name='productid' value='$outdata0[1]'></input><img onclick='returndocoutsrc0()' src = '$outdataimg0'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'out1' name='productid' value='$outdata1[1]'></input><img onclick='returndocoutsrc1()' src = '$outdataimg1'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'out2' name='productid' value='$outdata2[1]'></input><img onclick='returndocoutsrc2()' src = '$outdataimg2'/></form></td>";
				
				?>
			</tr>
		</table>
		</div>
		<div class ="titles">
			Cheap Stuffs
		</div>
		<div id ="frequtable">
		<table>
			<tr>
				<?php
				$statement = $conn->prepare($cheapcmd);
				$statement->execute();
				//$data=$statement->fetchAll(PDO::FETCH_ASSOC);
				$cheapdata0=$statement->fetch();
				$cheapdataimg0 =  $cheapdata0[0] .".PNG";
				$cheapdata1 =$statement->fetch();
				$cheapdataimg1 =  $cheapdata1[0] .".PNG";
				$cheapdata2 =$statement->fetch();
				$cheapdataimg2 = $cheapdata2[0] .".PNG";
				
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'cheap0' name='productid' value='$cheapdata0[1]'></input><img onclick='returndoccheapsrc0()' src = '$cheapdataimg0'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'cheap1' name='productid' value='$cheapdata1[1]'></input><img onclick='returndoccheapsrc1()' src = '$cheapdataimg1'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'cheap2' name='productid' value='$cheapdata2[1]'></input><img onclick='returndoccheapsrc2()' src = '$cheapdataimg2'/></form></td>";
				
				?>
			</tr>
		</table>
		</div>
		<!-- Frequently Searched -->
		<div class ="titles">
			Frequently Searched
		</div>
		<div id ="frequtable">
		<table>
			<tr>
				<?php
				$statement = $conn->prepare($freqcmd);
				$statement->execute();
				//$data=$statement->fetchAll(PDO::FETCH_ASSOC);
				$freqdata0=$statement->fetch();
				$freqdataimg0 =  $freqdata0[0] .".PNG";
				$freqdata1 =$statement->fetch();
				$freqdataimg1 =  $freqdata1[0] .".PNG";
				$freqdata2 =$statement->fetch();
				$freqdataimg2 = $freqdata2[0] .".PNG";
				
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'freq0' name='productid' value='$freqdata0[1]'></input><img onclick='returndocfreqsrc0()' src = '$freqdataimg0'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'freq1' name='productid' value='$freqdata1[1]'></input><img onclick='returndocfreqsrc1()' src = '$freqdataimg1'/></form></td>";
				echo "<td><form method = 'post' action = 'Chieh-Huang Chen WIPHP Viewing.php'><input type = 'hidden' id = 'freq2' name='productid' value='$freqdata2[1]'></input><img onclick='returndocfreqsrc2()' src = '$freqdataimg2'/></form></td>";
				
				?>
			</tr>
		</table>
		</div>
		</br></br>
		<div style = "font-size:10px">Note:These products are not for sale. This is a simulation for a project.All of these products are copied from an online shopping website without permission.</div>
	</body>
</html>
