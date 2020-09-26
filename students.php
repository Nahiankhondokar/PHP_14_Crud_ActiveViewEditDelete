<?php include_once "app/autoload.php"; ?>

<?php 

    /**
     *  Delete student data form Database and Table
     */

    if ( isset($_GET['delete_id']) ) {

      $delete_id = $_GET['delete_id'];
      $delete_image = $_GET['photo'];


      $sql = "DELETE FROM studentsTwo WHERE id='$delete_id'";

      $connection -> query($sql);



      // File delete function

      unlink( 'photo/students/' . $delete_image );

      

      // for going to one page to another page also same page(url clean)

      header("location:students.php");


    }


    /**
     * Active a user
     */

    if(isset($_GET['active_id'])) {
      
      $active_id = $_GET['active_id'];


      $sql = " UPDATE studentsTwo SET status='active' WHERE id='$active_id' ";
      $connection -> query($sql);

      header("location:students.php");

    }



    /**
     * Inactive a user
     */

    if(isset($_GET['inactive_id'])) {
      
      $inactive_id = $_GET['inactive_id'];


      $sql = " UPDATE studentsTwo SET status='inactive' WHERE id='$inactive_id' ";
      $connection -> query($sql);

      header("location:students.php");

    }


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Class 14</title>

  <!-- All CSS Files -->

  <link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
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
      <th scope="col">Gender</th>
      <th scope="col">Location</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

    <?php 

    // Get value for Database in Table

    $sql = "SELECT * FROM studentsTwo";

    $data = $connection -> query($sql);

    $i = 1;

    // Start while loop

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

        <?php if( $all_data['status'] == 'inactive' ) : ?>

          <a href="?active_id=<?php echo $all_data['id'] ?>" class="btn btn-success"><i class="far fa-thumbs-up"></i></a>

        <?php elseif( $all_data['status'] == 'active' ) : ?>

          <a href="?inactive_id=<?php echo $all_data['id'] ?>" class="btn btn-danger"><i class="far fa-thumbs-down"></i></a>

        <?php endif; ?>

         

        <a href="profile.php?student_id=<?php echo $all_data['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
        <a href="edit.php?edit_id=<?php echo $all_data['id'] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
        <a id="delete_btn" href="?delete_id=<?php echo $all_data['id'] ?>&photo=<?php echo $all_data['photo'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        
      </td>
    </tr>

  <!-- End while loop -->

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
		
    //  jQuery use for pop-up form

    $('a#delete_btn').click(function(){

      let conf = confirm('Are you sure ?');

      if ( conf == true ) {
        return true;

      }else{
        return false;

      }

    });


	</script>



</body>
</html>









