<?php 
	$conn = mysqli_connect('localhost','root','','contact_tracing');
	if (!$conn) {
	    echo "connection failed: " . mysqli_connect_error()."<br>";
	    echo "connection error no: " . mysqli_connect_errno();
	}
 ?>
