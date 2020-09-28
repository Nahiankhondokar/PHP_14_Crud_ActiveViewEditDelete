<?php include_once "app/autoload.php"; ?>


<?php 

	/**
	 *  Edit page form isseting
	 */

	if (isset($_POST['add'])) {

		$edit_id = $_GET['edit_id'];
		
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


		/**
		 *  Edit page Form validation
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

			// Image uploading system

			$photo_name = "";

			if ( empty($_FILES['new_photo']['name'])) {
				$photo_name = $_POST['old_photo'];
			}else{

			// File Management ( Photo updating system )

			$file_name = $_FILES['new_photo']['name'];
			$file_tmp_name = $_FILES['new_photo']['tmp_name'];
			$file_size = $_FILES['new_photo']['size'];

			$photo_name = md5( time() . rand() ) . $file_name;

			move_uploaded_file($file_tmp_name, 'photo/students/' . $photo_name);

			}


			// Sending data to Database

			$sql = "UPDATE studentsTwo SET name='$name', email='$email', cell='$cell', uname='$uname', age='$age', gender='$gender', shift='$shift', location='$location', photo='$photo_name' WHERE id='$edit_id'";

			$connection -> query($sql);


			


			$mess = validationMsg('Registration Updated !', 'success');


		}

	}


 ?>




<?php 

	if (isset($_GET['edit_id'])) {
		
		$edit_id = $_GET['edit_id'];


		$sql = " SELECT * FROM studentsTwo WHERE id='$edit_id' ";
		$data = $connection -> query($sql);

		$single_data = $data -> fetch_assoc();

	}


 ?>

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




<div class="student_form">
	<a href="students.php" class="btn btn-primary rounded-0">Back</a>
	<form class="form p-5 text-white shadow-lg" method="POST" enctype="multipart/form-data">
		<h1 class="text-center">Update Student Data </h1>

		 <?php 

		 if (isset($mess)) {
		 	echo $mess;
		 }

		  ?>
		
	  <div class="form-group">
	    <label for="exampleInputEmail1">Name</label>
	    <input name="name" type="text" value="<?php echo $single_data['name']; ?>" class="form-control text-white h-25">
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Email</label>
	    <input name="email" type="text" value="<?php echo $single_data['email']; ?>" class="form-control text-white h-25">
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Cell</label>
	    <input name="cell" type="text" value="<?php echo $single_data['cell']; ?>" class="form-control text-white h-25">
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">User Name</label>
	    <input name="uname" type="text" value="<?php echo $single_data['uname']; ?>" class="form-control text-white h-25">
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Age</label>
	    <input name="age" type="text" value="<?php echo $single_data['age']; ?>" class="form-control text-white h-25">
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Gender</label><br>
	    <input name="gender" <?php if( $single_data['gender'] == 'Male'){ echo "checked"; } ?> type="radio" value="Male" class="text-white p-2" id="male"><label class="p-1" for="male"> Male</label>
	    <input name="gender" <?php if( $single_data['gender'] == 'Female'){ echo "checked"; } ?> type="radio" value="Female" class="text-white" id="female"><label class="p-1" for="female"> Female</label>
	  </div>

	  <div class="form-group ">
	    <label for="exampleInputEmail1">Shift</label>
	    <select class="form-control h-25 text-white" name="shift">
	    	<option class="text-dark" value="">--Select--</option>
	    	<option class="text-dark" <?php if( $single_data['shift'] == 'Day'){ echo "selected"; } ?> value="Day">Day</option>
	    	<option class="text-dark" <?php if( $single_data['shift'] == 'Evening'){ echo "selected"; } ?> value="Evening">Evening</option>
	    </select>
	  </div>


	  <div class="form-group ">
	    <label for="exampleInputEmail1">Location</label>
	    <select class="form-control h-25 text-white" name="location">
	    	<option class="text-dark" value="">--Select--</option>
	    	<option <?php if( $single_data['location'] == 'Dhaka'){ echo "selected"; } ?> class="text-dark" value="Dhaka">Dhaka</option>
	    	<option <?php if( $single_data['location'] == 'Barisal'){ echo "selected"; } ?> class="text-dark" value="Barisal">Barisal</option>
	    	<option <?php if( $single_data['location'] == 'chittagong'){ echo "selected"; } ?> class="text-dark" value="chittagong">chittagong</option>
	    	<option <?php if( $single_data['location'] == 'Khulna'){ echo "selected"; } ?> class="text-dark" value="Khulna">Khulna</option>
	    	<option <?php if( $single_data['location'] == 'Mymensignh'){ echo "selected"; } ?> class="text-dark" value="Mymensignh">Mymensignh</option>
	    	<option <?php if( $single_data['location'] == 'Rangpur'){ echo "selected"; } ?> class="text-dark" value="Rangpur">Rangpur</option>
	    	<option <?php if( $single_data['location'] == 'Sylhet'){ echo "selected"; } ?> class="text-dark" value="Sylhet">Sylhet</option>
	    </select>
	  </div>

	  <div class="form-group">
	  	<img style="width: 100px;" src="photo/students/<?php echo $single_data['photo']; ?>" alt="">
	  	<input name="old_photo" value="<?php echo $single_data['photo']; ?>" type="hidden">
	  </div>
	  
	  <div class="form-group ">
	    <label for="exampleInputEmail1">Photo</label>
	    <input name="new_photo" type="file" class="form-control-file text-white">
	  </div>

	  <button name="add" type="submit" class="btn btn-primary">Update Now</button>
	</form>
</div>






	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		


	</script>


	
</body>
</html> 



