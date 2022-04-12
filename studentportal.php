
<?php 
	session_start();
	if ($_SESSION['id']) 
            {
                echo "Hello.";
            }
	else
        {
            header("Location: stulogin.php");
        }
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Student Portal</title>
        <link rel="stylesheet" type="text/css" href="styles/stp.css">
</head>
<body>
    <div style="width: 100%; border:1;">
    <h1>Welcome to Student Portal!</h1>
    </div>

	<div class="info">
		<p><b><font size="6">Your info :</font></b></p>
                <table border="1" style="color: white;">
			<tr>
				<th>Name</th>
				<th>ID</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Father's Name</th>
				<th>Mother's Name</th>
				<th>Parent's Number</th>
			</tr>
		<?php 
		$conn = mysqli_connect('localhost','root','','project');
		$id = $_SESSION['id'];
		$users = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");	
		$user = mysqli_fetch_object($users);
		echo "<tr><td>".($user->name)."</td><td>".($user->id)."</td><td>".($user->email)."</td><td>0".($user->phone).
		"</td><td>".($user->father)."</td><td>".($user->mother)."</td><td>0".($user->guardians_number)."</td>";
		 ?>
		 </table>

	</div>

	<div class="course">
		<p><b><font size="6">Course info :</b></font></p>
                <table border="1" style="color: white">
			<?php
			$mydb = mysqli_connect('localhost','root','','project');
			$sql=mysqli_query($mydb,"SELECT * FROM courses WHERE id=$id");
 				if(mysqli_num_rows($sql)>=1)
   				{
    				echo "<table border = '1'><tr><th>ID</th><th>Course Name</th><th>Section</th><th>Faculty</th><th>Semester</th>";
    				while ($row = mysqli_fetch_assoc($sql)) {
    					echo "<tr><td>".$row['id']."</td><td>".$row['c_name']."</td><td>".$row['sec']."</td><td>".$row['fac']."</td><td>".$row['sem']."</td>";
    				}
   				}else
   				{
   					echo('No courses registered yet!');
   				}
			 ?>
			</table>
			<br>

	</div>

		<div class="drop">
			<form method="post">
			 
			<p></a><button type="submit" name="result">Get result</button></p>
			</form>
				<?php 
				$mydb = mysqli_connect('localhost','root','','project');
					if (isset($_POST['result'])) 
					{
						$sql1=mysqli_query($mydb,"SELECT * FROM results WHERE id=$id");
 							if(mysqli_num_rows($sql1)>=1)
   							{
    							echo "<table border = '1'><tr><th>ID</th><th>Course Name</th><th>Faculty</th><th>Section</th><th>Semester</th><th>Grade</th>";
    							while ($row = mysqli_fetch_assoc($sql1)) 
    							{
    								echo "<tr><td>".$row['id']."</td><td>".$row['cname']."</td><td>".$row['ini']."</td><td>".$row['sec']."</td><td>".$row['semester']."</td><td>".$row['grade']."</td>";
    							}
   							}else
   								{
   									echo('No result found!');
   								}
					}
				 ?>
		</div>
		<br>
	

	<div class="logout">
            <p><a href="stulogin.php">Logout</a></p>
	</div>

</body>
</html>