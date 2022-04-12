<?php 
	session_start();
	if ($_SESSION['id']) {
		echo "Hello.";
	}
	else
		header("Location: teacherlogin.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Portal</title>
        <link rel="stylesheet" type="text/css" href="styles/tpstyle.css">
</head>
<body >
    <div style="width: 100%; border:1;">
    <h1>Welcome to Teacher Portal!</h1>
    </div>

	<div class="courses">
		<p><b><u>Manage Courses </u></b></p>
		<form method="post">
			<table>
				<tr>
					<td>Student ID:</td>
					<td><input type="number" name="id" required></td>
				</tr>
				<tr>
					<td>Course Name:</td>
					<td><input type="text" name="c_name" required></td>
				</tr>
				<tr>
					<td>Section :</td>
					<td><input type="text" name="sec" required></td>
				</tr>
				<tr>
					<td>Faculty Initial :</td>
					<td><input type="text" name="fac" required></td>
				</tr>
				<tr>
					<td>Semester :</td>
					<td><input type="text" name="sem" required></td>
				</tr>
				<tr>
					<td><button type="submit" name="enroll">Enroll</button></td>
				</tr>
			</table>
		</form>
                <p>
		<?php 
		$mydb = mysqli_connect('localhost','root','','project');

		if (isset($_POST['enroll'])) 
		{
			
			$id = $_POST['id'];
			$c_name = $_POST['c_name'];
			$sec = $_POST['sec'];
			$fac = $_POST['fac'];
			$sem = $_POST['sem'];

			$sql=mysqli_query($mydb,"SELECT * FROM students WHERE id=$id");
                        
 			if(mysqli_num_rows($sql)==0)
   			{
    			echo('Student id does not exist!');
   			}
   			else 
   			{
   				$query = mysqli_query($mydb,"INSERT into courses values ('$id','$c_name','$sec','$fac','$sem')");
   				echo('Successfully Enrolled!');
   			}
		}
		 ?>
		 </p>
                 <p> 
                    <?php
                    /*include 'connect_test_db.php';
                    $searchErr = '';
                    $student_grades='';
                    if(isset($_POST['save']))
                    {
                        if(!empty($_POST['search']))
                            {
                                $search = $_POST['search'];
                                $stmt = $con->prepare("select grade from results where id like '%$search%' or sec like '%$search%'");
                                $stmt->execute();
                                $student_grades = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                //print_r($student_grades);
         
                            }
                        else
                            {
                                $searchErr = "Please enter the information";
                            }
    
                    }
 
                    */?>
                 </p>
                 
                 
	</div>

	<div class="container">
		<form method="post">
		<table>
			<tr>
				<td><button type="submit" name="stinfo">Get Student info</button> <br></td>
				<td><button type="submit" name="stuinfo">Get Admin info</button><br></td>
			</tr>
		</table>
		</form>

		<?php 
		if (isset($_POST['stinfo'])) 
			{
				$sql=mysqli_query($mydb,"SELECT * FROM students");
 				if(mysqli_num_rows($sql)>=1)
   				{
  					echo "<table border = '1'><tr><th>Name</th><th>Email</th><th>Phone Number</th><th>ID</th><th>Parent's Number</th>";
    				while ($row = mysqli_fetch_assoc($sql)) 
    				{
   						echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>"."0".$row['phone']."</td><td>".$row['id']."</td><td>"."0".$row['guardians_number']."</td>";
    				}
   				}else
   				{
   					echo('No student is currently enrolled!');
   				}
   			}

   		if (isset($_POST['stuinfo'])) 
			{
				$sql1=mysqli_query($mydb,"SELECT * FROM admins");
 				if(mysqli_num_rows($sql1)>=1)
   				{
  					echo "<table border = '1'><tr><th>Name</th><th>Email</th><th>Phone Number</th>";
    				while ($row = mysqli_fetch_assoc($sql1)) 
    				{
   						echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td>";
    				}
   				}else
   				{
   					echo('No admin is currently enrolled!');
   				}
   			}
   				
		 ?>
            

	</div>

	<div class="logout">
			
            <p><a href="teacherlogin.php">Logout</a></p>

	</div>

</body>
</html>