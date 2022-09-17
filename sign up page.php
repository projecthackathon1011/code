<?php
$showAlert =false;
$showError =false;
$userexist =false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include './database/dbconnect.php';
    
	$username=$_POST["username"];
	$mobilenumber=$_POST["mobilenumber"];
	$password=$_POST["password"];
	$confirm_password=$_POST["confirm_password"];
	$exists=false;


	$username_query="SELECT * FROM login WHERE username='$username'";
	$username_query_run=mysqli_query($conn,$username_query);
	if(mysqli_num_rows($username_query_run)>0)
	{
		$userexist=true;
	}

	if(($password == $confirm_password) && $exists == false){
		$sql="INSERT INTO `login`(`username`,`mobilenumber`,`password`,`confirm_password`) VALUES ('$username','$mobilenumber','$password','$confirm_password')";
$result=mysqli_query($conn,$sql);
if($result){
	$showAlert=true;
}
	}

	else{
		$showError=true;
	}

	
}
?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SIGN UP Page in HTML with CSS Code Example</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>
<body>

<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>SIGN UP</h1>
		<p>THIS IS THE PROTOTYPE FOR SIGN UP PAGE FOR HACKATHON</p>
		<span>
			<p>login with gov app</p>
			<a href="#"><i class="" aria-hidden="true"></i>sign up with digital gujarat</a>
			<a href="#"><i class="" aria-hidden="true"></i> sign up with NAMO APP</a>
		</span>
		</div>
	</div>
	
	
		<div class="right">
		<h5>sign up</h5>
		<p><a href="sign up page.html">Creat Your Account</a>already have an account? </p>
		<form action="sign up page.php" method="post">
		<div class="inputs">
			<input type="text" placeholder="user name" name="username">
			<br>
			<?php
			if($userexist){
			echo	'<font color="red"> *user already exist</font>';
			}
			?>
			<br>
			<input type="text" placeholder="email id /mobile number" name="mobilenumber">
			<br>
			<input type="password" placeholder="password" name="password">
			<br>
			<input type="password" placeholder="confirm password" name="confirm password">
<?php
if($showError)
{
	
	echo '<font color="red"> *password not match</font>';
}
			?>
		</div>

			
			<br><br>
			
		<div class="remember-me--forget-password">
				<!-- Angular -->
	<label>
		<input type="checkbox" name="item">
		<span class="text-checkbox">Remember me</span>
	</label>
		</div>
			<br>
		  
			<button>SIGN UP</button>
	</div>
</form>
</div>

<!-- partial -->
  
</body>
</html>
