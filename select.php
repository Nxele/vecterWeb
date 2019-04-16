<?php
include'connection.php';

$sql =  "SELECT * FROM tbl_User";

$result = $conn -> query($sql);

while($row=$result -> fetch_assoc()){
	$data[]=$row;
}	
print json_encode($data);

$conn->close();
?>