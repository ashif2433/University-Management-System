<!DOCTYPE html>
<html>
<head>
	<title>Teacher Login</title>
</head>
	<link rel="stylesheet" type="text/css" href="styles/logstyle.css">
<body>

	<div class="header">
		<h1><marquee>University Management System</marquee></h1>
		<h2 style="right:36%;">Teacher Login Portal</h2>
	</div>

	<div class="container">
		
		<form class="loginform" action="teacherlogin.php" method="post">
                    <input type="number" name="id" placeholder="Teacher ID" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <button type="submit" name="login">Login</button>

		</form>

		<div>
			<label>Not an user? <a href="teachereg.php"><b>Register Now!</b></a></label>
		</div>
            <div>
                <p><a href="home.php"><b>Go back HOME!</b></a></p>
            </div>

	</div>


<?php 
	session_start();
	$conn = mysqli_connect('localhost','root','','project');
	if (isset($_POST['login'])) {
	$username = $_POST['id'];
	$password = $_POST['password'];

	$users = mysqli_query($conn,"SELECT * FROM teachers WHERE id=$username");
	
	if (mysqli_num_rows($users)!=0) {
		$user = mysqli_fetch_object($users);



	if ($username == $user->id && $password==$user->password) {
		echo('Login successful');
		$_SESSION['id']=$username;
		header("Location: teacherportal.php");
	}
	else
		echo "Username or password is incorrect";
	}else
		echo("Username or password is incorrect");
}
 ?>

</body>
</html>