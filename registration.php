<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
</head>
		<link rel="stylesheet" type="text/css" href="styles/regstyle.css">
<body>
	
		<div>
			<h1><marquee>University Management</marquee></h1>
			<h2>Student Registration!</h2><br>
                        <p class="logtext">Fill Up<br>The<br>Registration<br>Form!</p>
		</div>
	<div class="container">
		<br><br><form class="regform" action="registration.php" method="post">
			
                    
                    <table>
		<tr>
			<td>Your Name</td>
                        <td>:</td>
                        <td><input type="text" name="name" placeholder="Name" required></td>
		</tr>
		<tr>
			<td>Your ID</td>
                        <td>:</td>
                        <td><input type="number" name="id" placeholder="User ID" required></td>
		</tr>
                <tr>
			<td>Your Em@il</td>
                        <td>:</td>
                        <td><input type="email" name="email" placeholder="Email" required></td>
		</tr>
                <tr>
			<td>Your Phone Number</td>
                        <td>:</td>
                        <td><input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{11}" required></td>
		</tr>
                <tr>
			<td>Father's Name</td>
                        <td>:</td>
                        <td><input type="text" name="father" placeholder="Father's Name" required></td>
		</tr>
                <tr>
			<td>Mother's Name</td>
                        <td>:</td>
                        <td><input type="text" name="mother" placeholder="Mother's Name" required></td>
		</tr>
                <tr>
			<td>Parent's Phone Number</td>
                        <td>:</td>
                        <td><input type="tel" name="guardians_number" placeholder="Guardians Number" pattern="[0-9]{11}" required></td>
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
				<label>Not a student?</label>
				<label>Register as a <a href="teachereg.php"><b>teacher</b></a> or a <a href="adminreg.php"><b>admin</b></a>.</label>
				</p>
			</div>

			<div class="login">
				<label>Already registered? <a href="stulogin.php"><b>Login here!</b></a></label>
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
		$dad = $_POST['father'];
		$mom = $_POST['mother'];
		$g_number = $_POST['guardians_number'];
		$password = $_POST['password'];
		$con_pass = $_POST['confirm_password'];

		$sql=mysqli_query($mydb,"SELECT * FROM students WHERE id=$id");
 			if(mysqli_num_rows($sql)>=1)
   			{
    			echo('ID already exists!');
   			}
 			else
    		{
    			if ($password==$con_pass) {
					$result = mysqli_query($mydb,"INSERT into students values ('$username','$mail','$id','$phn','$dad','$mom','$g_number','$password')");
					echo('Registered Successfully!');
					header('Location: stulogin.php');
				}
				else
					echo('Passwords does not match!');
			}
	}
	 ?>

</body>
</html>