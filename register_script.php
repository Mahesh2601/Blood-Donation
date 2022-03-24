<?php
  require_once("common.php");

  $name = $_POST['name'];
  $name = mysqli_real_escape_string($conn,$name);
  $email = $_POST["email"];
  $email = mysqli_real_escape_string($conn,$email);
  $bloodgroup = $_POST["bloodgroup"];
  $bloodroup = mysqli_real_escape_string($conn,$bloodgroup);
  $contact = $_POST["contact"];
  $contact = mysqli_real_escape_string($conn,$contact);
  $state = $_POST["state"];
  $state = mysqli_real_escape_string($conn,$state);
  $city = $_POST["city"];
  $city = mysqli_real_escape_string($conn,$city);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

  $result = mysqli_query($conn,"SELECT * FROM donors WHERE email='$email'") or die(mysqli_error($conn));
  $num = mysqli_num_rows($result);

  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: register.php?m1=' . $m);
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: register.php?m1=' . $m);
  }  else {
    $query = "INSERT INTO donors(name,email,bloodgroup,contact,state,city) VALUES('".$name."','".$email."','".$bloodgroup."','".$contact."','".$state."','".$city."')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    header('location:index.php');
  }

?>
