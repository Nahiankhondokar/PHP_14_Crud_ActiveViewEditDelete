<?php include_once "app/autoload.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Class 14</title>
</head>
<body>


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




<div class="student_form">
	<a href="students.php" class="btn btn-primary rounded-0">All Students</a>
	<form class="form p-5 text-white shadow-lg" method="POST" enctype="multipart/form-data">
		<h1 class="text-center">Add New Student </h1>

		 <?php 

		 if (isset($mess)) {
		 	echo $mess;
		 }

		  ?>
		
	  <div class="form-group ">
	    <label for="exampleInputEmail1">Name</label>
	    <input name="name" type="text" class="form-control text-white h-25">
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Email</label>
	    <input name="email" type="text" class="form-control text-white h-25">
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Cell</label>
	    <input name="cell" type="text" class="form-control text-white h-25">
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">User Name</label>
	    <input name="uname" type="text" class="form-control text-white h-25">
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Age</label>
	    <input name="age" type="text" class="form-control text-white h-25">
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Gender</label><br>
	    <input name="gender" type="radio" value="Male" class="text-white p-2" id="male"><label class="p-1" for="male"> Male</label>
	    <input name="gender" type="radio" value="Female" class="text-white" id="female"><label class="p-1" for="female"> Female</label>
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Shift</label>
	    <select class="form-control h-25 text-white" name="shift">
	    	<option class="text-dark" value="">--Select--</option>
	    	<option class="text-dark" value="Day">Day</option>
	    	<option class="text-dark" value="Evening">Evening</option>
	    </select>
	  </div>


	  <div class="form-group ">
	    <label for="exampleInputEmail1">Location</label>
	    <select class="form-control h-25 text-white" name="location">
	    	<option class="text-dark" value="">--Select--</option>
	    	<option class="text-dark" value="Dhaka">Dhaka</option>
	    	<option class="text-dark" value="Barisal">Barisal</option>
	    	<option class="text-dark" value="chittagong">chittagong</option>
	    	<option class="text-dark" value="Khulna">Khulna</option>
	    	<option class="text-dark" value="Mymensignh">Mymensignh</option>
	    	<option class="text-dark" value="Rangpur">Rangpur</option>
	    	<option class="text-dark" value="Sylhet">Sylhet</option>
	    </select>
	  </div>
	  
	  <div class="form-group ">
	    <label for="exampleInputEmail1">Photo</label>
	    <input name="photo" type="file" class="form-control-file text-white">
	  </div>
	  <button name="add" type="submit" class="btn btn-primary">Add new student</button>
	</form>
</div>






	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		


	</script>


	
</body>
</html> 



