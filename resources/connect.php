<?php
    $connect= mysqli_connect("localhost","root","","doantn");
    if(mysqli_connect_error())
    {
        echo "Failed to connect to MySQL:".mysqli_connect_error();
    }
?>