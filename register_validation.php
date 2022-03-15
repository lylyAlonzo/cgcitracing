<?php 
   session_start();
    include ('db.php');
    
    $errors = array();

    if(isset($_POST['register_btn'])){
        $First_name = $_POST['firstname'];
        $Middle_name = $_POST['middlename'];
        $Last_name = $_POST['lastname'];
        $Contact = $_POST['contact']; 
        $Municipality = $_POST['municipality'];
        $Barangay = $_POST['barangay'];
        $Age = $_POST['age'];
        $Gender = $_POST['gender'];
        $Password = $_POST['password'];
        $image = $_FILES['user_image'];

        $imageName = $_FILES['user_image']['name'];
        $imageTmpName = $_FILES['user_image']['tmp_name'];
        $imageSize = $_FILES['user_image']['size'];
        $imageError = $_FILES['user_image']['error'];
        $imageType = $_FILES['user_image']['type'];

        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        $qry = "SELECT * FROM users";
        $result = mysqli_query($conn,$qry);
        
        
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $dbContact = $DataRows['contact'];
                $hashedPassword = $DataRows['password'];                  
            }
        }

        if(!empty($Contact)){
            $qry = "SELECT contact FROM users";
            $result = mysqli_query($conn,$qry);
            if (mysqli_num_rows($result)>0) {
                while ($DataRows = mysqli_fetch_assoc($result)) {
                    $dbContact = $DataRows['contact'];
                    if($Contact == $dbContact){
                        array_push($errors, "Number already exist!");
                    }               
                }
            }
        }

        if(!empty($Password)){
            $qry = "SELECT password FROM users";
            $result = mysqli_query($conn,$qry);
            if (mysqli_num_rows($result)>0) {
                while ($DataRows = mysqli_fetch_assoc($result)) {
                    $hashedPassword = $DataRows['password'];  
                    $UnhashedPassword = password_verify($Password, $hashedPassword);
                    if($Password == $UnhashedPassword){
                        array_push($errors, "Password already exist!");
                    }
                }
            }
        }
                    
        //name validation
        if(!preg_match ("/^[a-zA-z]*$/", $First_name)){  
           array_push($errors, "Invalid first name");
        }
        if(!preg_match ("/^[a-zA-z]*$/", $Middle_name)){  
            array_push($errors, "Invalid middle name");
         }
         if(!preg_match ("/^[a-zA-z]*$/", $Last_name)){  
            array_push($errors, "Invalid last name");
         }

         //image validation
         if(in_array($imageActualExt, $allowed)){
             //echo var_dump($_FILES['user_image']);
            if($imageError == 0){
                if($imageSize < 5000000){
                    $imageNameNew = uniqid().".".$imageActualExt;
                    $imageDestination = '/var/www/html/user_pictures/'.$imageNameNew;
                    // $imageDestination.replace(" ","");
                    move_uploaded_file($imageTmpName,$imageDestination);
                }
                else{
                    array_push($errors, "your file is too big");
                }
            }
            else{
                array_push($errors, "There was an error uploading your picture!");
                
            }
        }    

         // if there are no error, save info to database
         if(count($errors)==0){
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $Unique = uniqid();
            $sql = "INSERT INTO `users`(uniqueid,firstname,middlename,lastname,contact,municipality,barangay,age,gender,imagename,password) VALUES ('$Unique','$First_name','$Middle_name','$Last_name','$Contact','$Municipality','$Barangay','$Age' , '$Gender',' $imageNameNew','$hashedPassword')";
            mysqli_query($conn,$sql);
            header('location: index.php');
         } 
    }    

    //user login
    if(isset($_POST['login_btn'])){
        if(!empty($_POST['phone_number']) && !empty($_POST['password'])){
            $Contact = $_POST['phone_number'];
            $Password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE contact='$Contact'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) >0) {
                // echo "account found";
                while ($DataRows = mysqli_fetch_assoc($result)) {
                    $hashedPassword = $DataRows['password'];
                    $image = $DataRows['imagename'];
                    $UnhashedPassword = password_verify($Password, $hashedPassword);
                    if($Password == $UnhashedPassword){
                        $_SESSION['contact'] = $Contact;
                        $_SESSION['imagename'] = $image;
                        header('location: user_dash.php');
                    }
                    else{
                        echo "<script>alert('Pasword and number did not match')</script>";
                    }
                }
            }
            else{
                echo "<script>alert('Not registered!')</script>";
            }
        }
        else{
            echo "<script>alert('You have to input contact/password')</script>";
        }
    }

    //admin login
    if(isset($_POST['admin_login_btn'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $Username = $_POST['username'];
            $Password = $_POST['password'];
            $sql = "SELECT * FROM admin WHERE username='$Username' AND password='$Password'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) === 1){
                $_SESSION['username'] = $Username;
                header('location: admin.php');
            }
            else{
                echo "<script>alert('Pasword and number did not match')</script>";
            }   
        }
        else{
            echo "<script>alert('You have to input username/password')</script>";
        }
    }
    
    //log out
    if(isset($_GET['userlogout'])){
        session_destroy();
        unset($_SESSION['contact']);
        header('location: index.php');
    }
    if(isset($_GET['adminlogout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: admin_login.php');
    }

?>
