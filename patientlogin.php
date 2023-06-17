
<?php
session_start();
include("dbconnection.php");
if(isset($_SESSION['patientid']))
{
	echo "<script>window.location='patientaccount.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM patient WHERE loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) >= 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[patientid]= $rslogin[patientid] ;
		echo "<script>window.location='patientaccount.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid login id and password entered..'); </script>";
	}
}
?>

<head>
	<title>Patient Login Panel</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
	<img class="wave" src="img/wave.png">

	<div class="container">

		<div class="img">
			<img src="img/medicine.svg">
		</div>

		<div class="login-content">

			<form method="post" action="patientlogin.php">
				<img src="img/avatar.svg">
				<a href="index.php">
				<h2  style="font-size: 2rem;text-align:center;color: #1E90FF;" class="title">HMS | Patient Login</h2>
				</a>
				<a style="text-align: center;" href="patient.php">Create an Account?</a>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>

           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="loginid" id="loginid">
           		   </div>

           		</div>

           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" id="password">
            	   </div>
            	</div>

                <a style="text-align: right;" href="patientforgotpassword.php">Forgot Password?</a>
            	
            	<input type="submit" class="btn" name="submit" id="submit" value="Login">
            </form>
        </div>
    </div>
		<script type="text/javascript" src="js/main.js"></script>
	</body>

<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmpatlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmpatlogin.loginid.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatlogin.password.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatlogin.password.focus();
		return false;
	}
}
	</script>