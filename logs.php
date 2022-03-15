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
                <h2>Logs</h2>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Contact no.</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Temperature</th>
                        <th>Time in</th>
                        <th>Time out</th>
                    </tr>
                    
<?php
    include('db.php');
    $sql = "SELECT * FROM logs";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result)>0) {
        while ($DataRows = mysqli_fetch_assoc($result)) {
            $firstName = $DataRows['firstname'];
            $middleName = $DataRows['middlename'];
            $lastName = $DataRows['lastname'];
            $Contact = $DataRows['contact'];
            $Municipality = $DataRows['municipality'];
            $Barangay = $DataRows['barangay'];
            $Age = $DataRows['age'];
            $Gender = $DataRows['gender'];
            $Temperature = $DataRows['temperature'];
            $TimeIn = $DataRows['time_in'];
            $TimeOut = $DataRows['time_out'];
                    
?>
                    <tr>
                        <td><?php echo $firstName." ".$middleName." ".$lastName;?></td>
                        <td><?php echo $Contact; ?></td>
                        <td><?php echo $Municipality; ?></td>
                        <td><?php echo $Barangay; ?></td>
                        <td><?php echo $Age; ?></td>
                        <td><?php echo $Gender; ?></td>
                        <td><?php echo $Temperature; ?></td>
                        <td><?php echo $TimeIn; ?></td>
                        <td><?php echo $TimeOut; ?></td>
                    </tr>
<?php
        }   
    }
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




