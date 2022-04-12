<!DOCTYPE html>
<html>
<head>
	<title>Student Portal</title>
	<link rel="stylesheet" href="styles/logstyle.css">
</head>
<body>

	<div class="header">
		<h1><marquee>University Management System</marquee></h1>
		<h2> Student Login Portal</h2>
	</div>

	<div class="container">
		
		<form class="loginform" action="stulogin.php" method="post">
		<table>
				<tr>
					<td><input type="" name="id" placeholder="User ID" required></td>
				</tr>
				<tr>
					<td><input type="password" name="password" placeholder="Password" required></td>
				</tr>
				<tr>
					<td><button type="submit" name="login">Login</button></td>
				</tr>
			</table>
		</form>

		<div>
			<label>Not an user? <a href="registration.php"><b>Register Now!</b></a></label>
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

	$users = mysqli_query($conn,"SELECT * FROM students WHERE id=$username");
	

	if (mysqli_num_rows($users)!=0) {
		$user = mysqli_fetch_object($users);

	if ($username== $user->id && $password==$user->password) {
		echo('Login successful');
		$_SESSION['id']=$username;
		header("Location: studentportal.php");
	}
	else
		echo "Username or password is incorrect";
	}
		
}
 ?>

</body>
</html>