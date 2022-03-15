<?php
    session_start();
    include ('db.php');
    include ('phpqrcode/qrlib.php');

    if(isset($_SESSION['unique'])){
        $qr = $_SESSION['unique'];

        $sql = "SELECT * FROM `users` where uniqueid = '$qr'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $Uniqueid = $DataRows['uniqueid'];
                $firstName = $DataRows['firstname'];
                $middleName = $DataRows['middlename'];
                $lastName = $DataRows['lastname'];
            }
        }
        $fullname = $firstName." ".$middleName." ". $lastName;
        $qrInfo = $Uniqueid;

        $file = "qrimages/".$Uniqueid.".png";
    }
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
    <div class="qr_wrapper">
        <div class="qrCode">
            <h2><?php echo $fullname; ?></h2>
            <div>
                <?php
                    QRcode::png($qrInfo, $file, 'L', 10, 2);
                    echo "<img src='".$file."'>"; 
                ?> 
            </div>
        </div>
    </div>
</body>
</html>
    
