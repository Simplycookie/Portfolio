<?php


  $connect = mysqli_connect("localhost","root","","chocolate");

  if(isset($connect))
  {
    echo("Connect successfully!");
  }

?>
