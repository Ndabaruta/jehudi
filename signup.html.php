<?php
include'connection.php';
if (isset($_POST['submit'])) {
	$u_name=$_POST['adminname'];
	$password=md5($_POST['password']);
	$check="SELECT * FROM users WHERE u_name='$u_name'";
	$run=mysqli_query($con,$check);
	if (mysqli_num_rows($run)>0) {
		echo "<script>
		alert('username $u_name arleady exist ');
		window.location.replace('signup.php');</script>";
	}else{
		$insert=mysqli_query($con,"INSERT INTO users (u_name,u_password) VALUES('$u_name','$password')");
		if ($insert) {
		echo "<script>
		alert('User $u_name created successfully');
		window.location.replace('index.php');</script>";
      }
	}
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="css1/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INTEGO FC</title>
</head>
<body style="background-color: rgba(177, 250, 143, 0.815);">
<div class="form-login" style="height:480px;width:380px;display:flex;justify-content: center;align-items: center;padding:20px;font-size: 20px;background: rgb(9, 104, 40);box-shadow: 0 0 20px black;">
	<form method="POST" >
		<div class="h3" style="width:400px;background:  rgba(177, 250, 143, 0.815);;;border-radius: 4px;">
		<h4 style="position:relative;bottom:40px;color:white;">SIGNUP IN IFC</h4>
		<div class="j" style="position:relative;left:10px;">
		<label style="position:relative;left:10px;">Username</label>
		<input type="text" placeholder="Enter Username" name="adminname" required style="position:relative;left:10px;border-left: 5px solid rgb(5, 16, 37);border-radius: 0 10px 10px 0;"><br><br>
		<label style="position:relative;left:10px;">Password</label>
		<input type="password" placeholder="Enter Password"  name="password" required style="position:relative;left:10px;border-left: 5px solid rgb(7, 23, 51);border-radius: 0 10px 10px 0;"><br><br>
		<p style="position:relative;left:10px;color:black;">Do have an account:<a href="index.php" style="color:rgb(9, 22, 46);font-size:15px;">login here</a></p><br><br>
		</div>
		<button name="submit" style="width:370px;position: relative;right: 80px;bottom:20px; background: rgb(4, 20, 49)">Signup</button>
		</div>
	</form>
</div>
</body>
</html>