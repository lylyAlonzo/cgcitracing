<?php
    session_start();
    include('db.php');

    if(isset($_SESSION['username'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="admin_dash">
        <div class="header">
            <h1>CGCI Tracing</h1>
            <a href="admin_login.php?adminlogout='1'">Log out</a>
        </div>
        <div class="content">
            <div class="nav">
                <a href="admin.php">Users</a>
                <a href="logs.php">Logs</a>
                <a href="">Reports</a>
                <a href="">Log out</a>
            </div>
            <div class="table">
                <h2>Registered Users</h2>
                <table>
                    <tr>
                        <th>Id no.</th>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last name</th>
                        <th>Contact no.</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>

                    <?php
                        include ('admin_dash_process.php');
                    ?>
                    
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>



<?php
    }
    else{
        header('location: admin_login.php');
    }
?>
