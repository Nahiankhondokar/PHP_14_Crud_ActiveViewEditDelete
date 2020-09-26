<?php include_once "app/autoload.php"; ?>

<?php 

	/**
     * View user profile
     */

	if (isset($_GET['student_id'])) {
		$student_id = $_GET['student_id'];

		$sql = "SELECT * FROM studentsTwo WHERE id='$student_id'";

		$data = $connection -> query($sql);

		$single_student = $data -> fetch_assoc();



	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Class 14</title>

	<!-- All CSS Files -->

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
</head>
<body>



<div class="student_form">
	<a href="students.php" class="btn btn-primary rounded-0">Back</a>
	<div class="profile form p-3 text-white shadow-lg" id="">

		<img src="photo/students/<?php echo $single_student['photo']; ?>" alt="">
		<h2><?php echo $single_student['name']; ?></h2>
		<h4><?php echo $single_student['uname']; ?></h4>

		<table class="profileTwo text-white">
			<tr>
				<td>name</td>
				<td><?php echo $single_student['name']; ?></td>
			</tr>

			<tr>
				<td>User Name</td>
				<td><?php echo $single_student['uname']; ?></td>
			</tr>

			<tr>
				<td>Email</td>
				<td><?php echo $single_student['email']; ?></td>
			</tr>

			<tr>
				<td>Cell</td>
				<td><?php echo $single_student['cell']; ?></td>
			</tr>

			<tr>
				<td>Gender</td>
				<td><?php echo $single_student['gender']; ?></td>
			</tr>

			<tr>
				<td>AGe</td>
				<td><?php echo $single_student['age']; ?></td>
			</tr>
		</table>
		
	
	</div>
</div>






	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		


	</script>


	
</body>
</html> 



