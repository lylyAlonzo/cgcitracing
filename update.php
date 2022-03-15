<?php
    session_start();
	include('db.php');

    if(isset($_POST['update'])){

   
        $id = $_SESSION['unique'];
        $First_name = $_POST['firstname'];
        $Middle_name = $_POST['middlename'];
        $Last_name = $_POST['lastname'];
        $Contact = $_POST['contact'];
        $Municipality = $_POST['municipality'];
        $Barangay = $_POST['barangay'];
        $Age = $_POST['age'];
        $Gender = $_POST['gender'];

        $sql = "UPDATE users SET firstname='$First_name', middlename='$Middle_name', lastname='$Last_name', contact='$Contact', municipality = '$Municipality', barangay = '$Barangay', age='$Age', gender='$Gender' WHERE uniqueid = '$id'";
        $result = mysqli_query($conn,$sql);
    
        header('location:user_dash.php');
    }
?>