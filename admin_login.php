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
    <div class="wrapper">
        
        <div  class="login_div">
            <h2>Admin Log in</h2>
            <div class="image">
                <img src="contact_logo.png" alt="">
            </div>
            <form action="admin_login.php" method="POST">
                <label for="username">Enter username</label>
                <br>
                <input type="text" name="username" >
                <br>
                <label for="password">Enter password</label>
                <input type="password" name="password" >
                <br>
                <button class="login_btn" type="submit" name="admin_login_btn">Log in</button>
                <br>
                
            </form>

        </div>
    </div>
</body>
</html>

