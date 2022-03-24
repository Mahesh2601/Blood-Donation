<?php
    $conn = mysqli_connect("localhost","root","","blooddonation");
    if(!$conn){
      die("Couldn't connect MySql Server : ".mysql_error());
    }
?>
