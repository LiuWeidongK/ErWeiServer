<?php

    $randnumber = $_GET['randnumber'];
    $username = $_GET['username'];

    $conn = new mysqli("localhost" , "root" , "0000" , "login");
    mysqli_query($conn,"update user set username = '$username' where password = '$randnumber'");

?>