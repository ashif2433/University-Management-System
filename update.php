<?php 
	session_start();
	if ($_SESSION['id']) {
		echo "Hello " . $_SESSION['id']. (";");
	}
	else
		header("Location: teacherlogin.php");

	$serial = $_SESSION['serial'];

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

	<div class="update">
		<h2>Update Student Result</h2>
		<form method="post">
		<p>Student ID : <input type="number" name="id" required></p>
		<p>Course Name : <input type="text" name="c_name" required></p>
		<p>Section : <input type="number" name="sec" required></p>
		<p>Faculty Initial : <input type="text" name="fac" required></p>
		<p>Semester : <input type="text" name="sem" required></p>
		<p>Grade : <input type="text" name="grade" required></p>
		<button type="submit" name="update">Update</button>
		</form>
		<form method="post">
		<button type="submit" name="redirect">Go Back</button>
		</form>
	</div>

		<?php 
		$mydb = mysqli_connect('localhost','root','','project');

		if (isset($_POST['update'])) 
		{
			
			$id = $_POST['id'];
			$c_name = $_POST['c_name'];
			$sec = $_POST['sec'];
			$fac = $_POST['fac'];
			$sem = $_POST['sem'];
			$grade = $_POST['grade'];

			$sql=mysqli_query($mydb,"SELECT * FROM students WHERE id=$id");
 			if(mysqli_num_rows($sql)==0)
   			{
    			echo('Result does not exist!');
   			}
   			
   		}

   			if (isset($_POST['redirect'])) {
   				header("Location: teacherportal.php");
   			}

		?>


 </body>
 </html>



 