<?php
    session_start();
    include ('db.php');

    if(isset($_SESSION['contact'])){
    
        $Contact = $_SESSION['contact'];
        $imageName = $_SESSION['imagename'];
        
        $sql = "SELECT * FROM users WHERE contact='$Contact'";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $Uniqueid = $DataRows['uniqueid'];
                $firstName = $DataRows['firstname'];
                $middleName = $DataRows['middlename'];
                $lastName = $DataRows['lastname'];
                $Contact = $DataRows['contact'];
                $Municipality = $DataRows['municipality'];
                $Barangay = $DataRows['barangay'];
                $Age = $DataRows['age'];
                $Gender = $DataRows['gender'];
                $Image = $DataRows['imagename'];
                $path = str_replace(" ", "", $Image);
            }
        }
    $_SESSION['unique'] = $Uniqueid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="user_wrapper">
        <a href="index.php?userlogout='1'">Log out</a>
        <div class="user_dash">
            <div class="user_img">
            <?php echo "<img class='image' src='user_pictures/".$path."'>"; ?>
            </div>

            <div class="user_info">
                <h3><?php echo $firstName." ".$middleName." ".$lastName; ?></h3>
                <div class="details">
                    <p>Contact Number:</p>
                    <p>Municipality: </p>
                    <p>Barangay:</p>
                    <p>Age:</p>
                    <p>Gender:</p>
                </div>
                <div class="info">
                    <p><?php echo $Contact; ?></p>
                    <p><?php echo $Municipality; ?></p>
                    <p><?php echo $Barangay; ?></p>
                    <p><?php echo $Age; ?></p>
                    <p><?php echo $Gender; ?></p>
                </div>
            </div>
            <a class="update" href="edit.php">Edit</a>
            <a class="generate_qr" href="generate.php">Generate QR</a>
        </div>
    </div>
</body>
</html>

<?php 
    }
    
    else{
        header('location: index.php');
    }
?>
