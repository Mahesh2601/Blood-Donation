<!DOCTYPE html>
<head>
	<title>Donors | Blood Donation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
  <div class="container pos">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact No</th>
        </tr>
      </thead>
<?php
  require_once("common.php");
  include "header.php";

  $bloodgroup = $_POST["bloodgroup"];
  $bloodroup = mysqli_real_escape_string($conn,$bloodgroup);

  $state = $_POST["state"];
  $state = mysqli_real_escape_string($conn,$state);

  $city = $_POST["city"];
  $city = mysqli_real_escape_string($conn,$city);

  $query1 = "SELECT * FROM donors WHERE bloodgroup='$bloodgroup' AND state='$state' AND city = '$city'";
  $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
  $num = mysqli_num_rows($result1);
	$query2 = "SELECT * FROM bloodbanks WHERE city_id='$city'";
	$result2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));

  if($num != 0){?>
    <tbody>
      <?php
          $sno = 0;
          while ($row = mysqli_fetch_array($result1)) {
            $sno = $sno + 1 ;
       ?>
      <tr>
        <td scope='row'><?php echo $sno; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact']; ?></td>
      </tr>
    <?php }?>
    </tbody>
<?php
  }
  else{
    ?>
    <h3 style="text-align:center">Sorry! No Donors of this Blood Group Exists in Database</h3>
    <?php
  }

?>
</table>
<div class="container pos">
	<h3>Blood Banks near your City</h3><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Address</th>
				<th>Contact</th>
			</tr>
		</thead>
		<tbody>
      <?php
          $sno = 0;
          while ($row = mysqli_fetch_array($result2)) {
            $sno = $sno + 1 ;
       ?>
      <tr>
        <td scope='row'><?php echo $sno; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['contact']; ?></td>
      </tr>
    <?php }?>
    </tbody>
	</table>
</div>
<div>
</body>
</html>
