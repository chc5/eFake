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
		</style>
		<script>
		
		</script>
	</head>
	<body>
		<span class = "eFake" onclick ="window.location.href='index.php'"><sub>e</sub>Fake</span></br>
			<div>Create your personal account by filling out the form below.</div>
		<form method = "post" id ="createacc" action = "Chieh-Huang Chen WIP Finish Account.php">
			First Name:<input type="text" name = "FName" placeholder="Enter Your First Name" pattern ="[A-Za-z]+$" required/></br>
			Last Name:<input type="text" name = "LName" placeholder="Enter Your Last Name" pattern="[A-Za-z]+$" required/></br>
			Email Address:<input type = "email" name="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" title ="Your email address has an invalid email address format."required></br>
			Gender: <label for ="gen1">Male<input id ="gen1" type = "radio" name = "Gender" value="Male" checked = "checked"/></label> <label for ="gen2">Female <input id ="gen2"type = "radio" name = "Gender" value="Female"/></label> </br>
			Date Of Birth:<input type = "date" name="DOBirth" min = "1900-01-01" max = "1998-05-01" required></input></br>
			Username:<input type = "text" name = "Username" placeholder="Enter Your Username" pattern="[A-Za-z0-9]{6,}" title="Your password must be at least 6 characters long." required></input></br>
			Password:<input type = "password" name="Password" pattern="[A-Za-z0-9]{8,}" title ="Your password must be at least 8 characters long." placeholder ="Enter Your Password" required></input></br>
			<input type = "submit" id = "submit"></input>
		</form>
	</body>
</html>