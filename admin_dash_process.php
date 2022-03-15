<?php
$sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $firstName = $DataRows['firstname'];
                $middleName = $DataRows['middlename'];
                $lastName = $DataRows['lastname'];
                $Contact = $DataRows['contact'];
                $Municipality = $DataRows['municipality'];
                $Barangay = $DataRows['barangay'];
                $Age = $DataRows['age'];
                $Gender = $DataRows['gender'];
                $Image = $DataRows['imagename'];
?>
                <tr>
                    <td><?php echo $Id;?></td>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $middleName; ?></td>
                    <td><?php echo $lastName; ?></td>
                    <td><?php echo $Contact; ?></td>
                    <td><?php echo $Municipality; ?></td>
                    <td><?php echo $Barangay; ?></td>
                    <td><?php echo $Age; ?></td>
                    <td><?php echo $Gender; ?></td>
                </tr>
<?php
            }
        }
?>
