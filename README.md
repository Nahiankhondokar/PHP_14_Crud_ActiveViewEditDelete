## index dot php


### Formisseting


<?php 

	/**
	 * Form isseting
	 */

	if (isset($_POST['add'])) {
		
		// Get value

		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$uname = $_POST['uname'];
		$age = $_POST['age'];

		// Gernder isseting

		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		}
		
		$shift = $_POST['shift'];
		$location = $_POST['location'];



		// File Management

		$file_name = $_FILES['photo']['name'];
		$file_tmp_name = $_FILES['photo']['tmp_name'];
		$file_size = $_FILES['photo']['size'];


		$unique_file_name = md5( time() . rand() ) . $file_name;



		/**
		 * Form validation
		 */

		if ( empty($name) || empty($email) || empty($cell) || empty($uname) || empty($age) || empty($gender) || empty($shift) || empty($location) ) {
			
			$mess = validationMsg('All feilds are required !');

		}elseif( !filter_var($email, FILTER_VALIDATE_EMAIL)){

			$mess = validationMsg('Invalid Email !');

		}elseif( $age <= 5 || $age >= 12 ){

			// Nasted if else

			if ( $age <= 5 ) {
				$mess = validationMsg('Your age is under the limit !');
			}elseif( $age >= 12 ){
				$mess = validationMsg('Your age is over the limit !');
			}

		}else{

			// Sending data to Database

			$sql = "INSERT INTO studentsTwo (name, email, cell, uname, age, gender, shift, location, photo) VALUES ('$name','$email','$cell','$uname','$age','$gender','$shift','$location', '$unique_file_name')";

			$connection -> query($sql);

			move_uploaded_file($file_tmp_name, 'photo/students/' . $unique_file_name);

			$mess = validationMsg('Registration Completed !', 'success');


		}

	}


 ?>






## profile dot php



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
	<title>Class 49</title>

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

