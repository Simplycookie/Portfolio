<?php


$connect = mysqli_connect("localhost","root","","dice_eaa");
if(!$connect){
    die("connection failed: " . mysqli_connect_error());
}

?>