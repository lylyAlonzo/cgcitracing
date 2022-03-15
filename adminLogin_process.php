<?php 
    session_start(); 
    include ('db.php');

    if(isset($_POST['admin_login_btn'])){
        $Username = $_POST['username'];
        $Password = $_POST['password'];
                    
        $sql = "SELECT * FROM admin WHERE username='$Username' AND password='$Password'";
        $result = mysqli_query($conn,$sql);
       

        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $user = $DataRows['username'];
                $pass = $DataRows['password'];
            }
           
                if($Username == $user && $Password == $pass ){
                    
                    header('location: admin.php');
                }
                else{
                    header('location: admin_login.html');
                }
        }
    }
            
?>