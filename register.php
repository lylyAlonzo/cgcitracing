<?php 
    include('register_validation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="register_wrapper">
        <div class="register_div">
            <form action="register.php" method="POST" enctype="multipart/form-data">
                <h2>Register</h2>
                <!-- display eerror -->
                <?php include('errors.php'); ?>
                <input class="fname" type="text" name="firstname" placeholder="First name" required>
                <input class="mname" type="text" name="middlename" placeholder="Middle name" required>
                <input class="lname" type="text" name="lastname" placeholder="Last name" required>
                <br>
                
                <input type="number" name="contact" placeholder="Phone number" required>
                <br>
               
                <input class="municipality" type="text" name="municipality" placeholder="Municipality" required>
                
                <input class="barangay" type="text" name="barangay" placeholder="Barangay" required>
                <br>
                <input class="age" type="number" name="age" placeholder="Age" required>
                
                <select class="gender" name="gender" id="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <br>
                
                <input type="text" name="password" placeholder="Password" required>
                <br>
                
                <input type="file" name="user_image" id="id_picture" required>
                <br>
                <button class="register_btn" type="submit" name="register_btn">Register</button>
                <br>
                <p class="have_account">Already have an account? <b> <a href="index.php">Log in</a></b></p>
            </form>
        </div>
    </div>
</body>
</html>