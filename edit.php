<?php
    session_start();
	include('db.php');
    
	if(isset($_SESSION['unique'])){
        $id = $_SESSION['unique'];
        $sql = "SELECT * FROM `users` where uniqueid = '$id'";
        $result = mysqli_query($conn,$sql);
        $DataRows = mysqli_fetch_assoc($result);
        $Fname = $DataRows['firstname'];
        $Mname = $DataRows['middlename'];
        $Lname = $DataRows['lastname'];
        $Contact = $DataRows['contact'];
        $Municipality = $DataRows['municipality'];
        $Barangay = $DataRows['barangay'];
        $Age = $DataRows['age'];
        $Gender = $DataRows['gender'];
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title></title>
</head>
<body>
    <div class="edit_wrapper">
        <div class="edit_div">

        
            <form class="add-edit" method="POST" action="update.php?id=<?php echo $id; ?>">
                <h2>Update your info</h2>
                <input type="text" class="fname" value="<?php echo $Fname; ?>" name="firstname">
                
                <input type="text" class="mname" value="<?php echo $Mname; ?>" name="middlename">
                

                
                <input type="text" class="lname" value="<?php echo $Lname; ?>" name="lastname">
                

                
                <input type="text" class="contact" value="<?php echo $Contact; ?>" name="contact">
                <br>

            
                <input type="text" class="municipality" value="<?php echo $Municipality; ?>" name="municipality">
               

                
                <input type="text" class="barangay" value="<?php echo $Barangay; ?>" name="barangay">
                <br>

                
                <input type="text" class="age" value="<?php echo $Age; ?>" name="age" >
                

                
                <select class="gender" name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                <br>


                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>

</body>
</html>