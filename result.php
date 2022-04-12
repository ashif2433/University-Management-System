<?php 
	session_start();
	if ($_SESSION['name']) {
		echo "Hello " . $_SESSION['username']. (";");
	}
	else
		header("Location: teacherlogin.php");

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Teacher Portal</title>
</head>
<body>
	<div class="header">
		<h1>Welcome to Teacher Portal!</h1>
	</div>


	<div class="see">
		<form method="post">
			<p><button type="submit" name="seeres">Click</button> to see serial numbers of results.</p>
		</form>

		<?php 

		if (isset($_POST['seeres'])) 
		{
			$mydb = mysqli_connect('localhost','root','','project');
			$sql1=mysqli_query($mydb,"SELECT * FROM results");
 				if(mysqli_num_rows($sql1)>=1)
   				{
   					echo "<table border = '1'><tr><th>ID</th><th>Course Name</th><th>Section</th><th>Faculty</th><th>Semester</th><th>Grade</th>";
    				while ($row = mysqli_fetch_assoc($sql1)) 
    				{
   						echo "<tr><td>".$row['id']."</td><td>".$row['cname']."</td><td>".$row['sec']."</td><td>".$row['ini']."</td><td>".$row['semester']."</td><td>".$row['grade']."</td>";
    				}
   				}else
  				{
 					echo('No result found!');
  				}
  			}
		 ?>


	</div>
	

	
</body>
</html>