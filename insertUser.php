<?php
include'connection.php';

$data = json_decode(file_get_contents("php://input"));

$name = ($data->Name);
$surname = ($data -> Surname);
$email = ($data->Email);
$gender = ($data->Gender);

$sql = "INSERT INTO `tbl_user` (`Name`, `Surname`, `Email`, `Gender`) VALUES ('".$name."', '".$surname."', '".$email."', '".$gender."')";
  if($conn->query($sql)===true){
  	echo "data saved";
  }else{ echo "Faled inserting";}
?>