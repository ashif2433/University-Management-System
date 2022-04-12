<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
</head>
	<link rel="stylesheet" type="text/css" href="styles/regstyle.css">
<body>
	
		<div class="header">
			<h1 style="left: 45%;"><marquee>University Management</marquee></h1>
			<h2 style="left: 13%;">Admin Registration!</h2>
                        <p class="logtext">Fill Up<br>The<br>Registration<br>Form!</p>
		</div>
	
	<div class="container">

		<br><br><form class="regform" action="adminreg.php" method="post">

                    <table>
		<tr>
			<td>Your Name</td>
                        <td>:</td>
                        <td><input type="text" name="name" placeholder="Name" required></td>
		</tr>
		<tr>
			<td>Admin ID</td>
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
				<label>Not an admin?</label>
				<label>Register as a <a href="registration.php"><b>student</b></a> or a <a href="teachereg.php"><b>teacher</b></a>.</label>
				</p>
			</div>

			<div class="login">
				
				<label>Already registered? <a href="adminlogin.php"><b>Login here!</b></a></label>

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
		$password = $_POST['password'];
		$con_pass = $_POST['confirm_password'];

		$sql=mysqli_query($mydb,"SELECT * FROM admins WHERE id=$id");
 			if(mysqli_num_rows($sql)>=1)
   			{
    			echo('ID already exists!');
   			}
 			else
    		{
    			if ($password==$con_pass) {
					$result = mysqli_query($mydb,"INSERT into admins values ('$username','$mail','$id','$phn','$password')");
					echo('Registered Successfully!');
					header('Location: adminlogin.php');
				}
				else
					echo('Passwords does not match!');

			}
	}


	 ?>

</body>
</html>