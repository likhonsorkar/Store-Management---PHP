<?php
    $host_name = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'store_db';
    $conn = mysqli_connect($host_name, $db_user, $db_pass, $db_name);
    if($conn){
        //echo "Mysqli is Connected";
    }else{
        die("Connected Failed ". mysqli_connect_error());
    }

?>