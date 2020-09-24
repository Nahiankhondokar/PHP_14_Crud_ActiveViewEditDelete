<?php include_once "app/autoload.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<title></title>
</head>
<body>



<div class="table mt-5">
<a href="index.php" class="btn btn-primary rounded-0">Add New Students</a>
<h2 class="title bg-dark p-3 mb-0 text-white w-100">All Students</h2>
<table class="table-striped shadow-lg table-dark w-100 mt-0">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Cell</th>
      <th scope="col">gender</th>
      <th scope="col">Location</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

    <?php 

    $sql = "SELECT * FROM studentsTwo";

    $data = $connection -> query($sql);

    $i = 1;

    while ( $all_data = $data -> fetch_assoc() ) {
        
      $ii = $i++;

     ?>



    <tr>
      <td scope="row"><?php echo $ii; ?></td>
      <td><?php echo $all_data['name']; ?></td>
      <td><?php echo $all_data['email']; ?></td>
      <td><?php echo $all_data['cell']; ?></td>
      <td><?php echo $all_data['gender']; ?></td>
      <td><?php echo $all_data['location']; ?></td>
      <td><img src="photo/students/<?php echo $all_data['photo']; ?>" alt=""></td>
      <td>
        <a href="#" class="btn btn-info">View</a>
        <a href="#" class="btn btn-warning">Edit</a>
        <a href="#" class="btn btn-danger">Delete</a>
      </td>
    </tr>


  <?php } ?>


  </tbody>
</table>
<br>
<br>
<br>
<br>
</div>








	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		


	</script>



</body>
</html>









