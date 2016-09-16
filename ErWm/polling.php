<?php
    $conn = new mysqli("localhost" , "root" , "0000" , "login");
    $randnumber = $_GET['randnumber'];
    $result = mysqli_query($conn,"select * from user where password = '$randnumber'");
    $row = mysqli_fetch_array($result);
    if($row['username']!="")
        echo "true";
    else
        echo "false";
?>  