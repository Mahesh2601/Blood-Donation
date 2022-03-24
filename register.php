<!DOCTYPE html>
<head>
	<title>Register | Blood Donation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<?php
		include "header.php";
	?>

<div class="container pos">
		<h1>Register to Donate </h1><br>
    <form  action="register_script.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name"  required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control"  placeholder="Email"  name="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						<?php
                  if(isset($_GET["m1"])){
                      echo $_GET['m1'];
                  }
              ?>

        </div>
        <div class="form-group">
          <select class="custom-select form-control" name="bloodgroup" required>
            <option value="">Select Blood Group</option>
            <option value="1">A+</option>
            <option value="2">A-</option>
            <option value="3">B+</option>
            <option value="4">B-</option>
            <option value="5">AB+</option>
            <option value="6">AB-</option>
            <option value="7">O+</option>
            <option value="8">O-</option>
          </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Contact No" maxlength="10" size="10" name="contact" required>
					
				</div>
        <div class="form-group" id="state-dropdown">
          <select name="state" class="custom-select form-control" required>
            <option value="">Select State</option>
            <?php
								require_once("common.php");
								$result = mysqli_query($conn,"SELECT * FROM states");
								while($row = mysqli_fetch_array($result)){
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row["name"];?></option>
					<?php		}
						 ?>
          </select>
        </div>


        <div class="form-group" id="city-dropdown">
          <select name="city" class="custom-select form-control" required>
            <option value="">Select City</option>
						<?php
								require_once("common.php");
								$result = mysqli_query($conn,"SELECT * FROM cities");
								while($row = mysqli_fetch_array($result)){
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row["name"];?></option>
					<?php		}
						 ?>

          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!-- <script>
$(document).ready(function() {
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "city-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
});
</script> -->
</body>

</html>
