<!DOCTYPE html>
<html>
<head>
	<title>Teacher Registration</title>
</head>
	<link rel="stylesheet" type="text/css" href="styles/regstyle.css">
<body>
	
		<div class="header">
			<h1><marquee>University Management</marquee></h1>
			<h2>Teacher Registration!</h2>
                        <p class="logtext">Fill Up<br>The<br>Registration<br>Form!</p>
		</div>
	
	<div class="container">

		<br><br><form class="regform" action="teachereg.php" method="post">
                    
                    
                    <table>
		<tr>
			<td>Your Name</td>
                        <td>:</td>
                        <td><input type="text" name="name" placeholder="Name" required></td>
		</tr>
		<tr>
			<td>Teacher ID</td>
                        <td>:</td>
                        <td><input type="number" name="id" placeholder="ID" required></td>
		</tr>
                <tr>
			<td>Em@il Address</td>
                        <td>:</td>
                        <td><input type="email" name="email" placeholder="Email" required></td>
		</tr>
                <tr>
			<td>Phone Number</td>
                        <td>:</td>
                        <td><input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{11}" required></td>
		</tr>
                <tr>
			<td>Teacher Initial</td>
                        <td>:</td>
                        <td><input type="text" name="initial" placeholder="Initial" required></td>
		</tr>
                <tr>
			<td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="password" placeholder="Password" required></td>
		</tr>
                <tr>
			<td>Confirm Password</td>
                        <td>:</td>
                        <td><input type="password" name="confirm_password" placeholder="Confirm Password" required></td>
		</tr>
                <tr>
                        <td><button type="submit" name="register">Register</button></td>
		</tr>
	</table>
                    

			<div class="notuser">
				<p>
				<label>Not a teacher?</label>
				<label>Register as a <a href="registration.php"><b>student</b></a> or a <a href="adminreg.php"><b>admin</b></a>.</label>
				</p>
			</div>

			<div class="login">
				
				<label>Already registered? <a href="teacherlogin.php"><b>Login here!</b></a></label>

			</div>

		</form>

	</div>

	<?php 

	session_start();
	
	$mydb = mysqli_connect('localhost','root','','project') or die("Couldn't connect to database!");
	if(isset($_POST['register']))
	{
		$username = $_POST['name'];
		$id = $_POST['id'];
		$mail = $_POST['email'];
		$phn = $_POST['phone'];
		$initial = $_POST['initial'];
		$password = $_POST['password'];
		$con_pass = $_POST['confirm_password'];

		$sql=mysqli_query($mydb,"SELECT * FROM teachers WHERE id=$id");
 			if(mysqli_num_rows($sql)>=1)
   			{
    			echo('ID already exists!');
   			}
 			else
    		{
    			if ($password==$con_pass) {
					$result = mysqli_query($mydb,"INSERT into teachers values ('$username','$mail','$id','$phn','$initial','$password')");
					echo('Registered Successfully!');
					header('Location: teacherlogin.php');
				}
				else
					echo('Passwords does not match!');

			}
	}


	 ?>

</body>
</html>