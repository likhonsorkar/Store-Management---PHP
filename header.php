<?php
    session_start();
    if(isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['email'])){
        $sessionfname = $_SESSION['fname'];
        $sessionlname = $_SESSION['lname'];
        $sessionemail = $_SESSION['email'];
    }else{
        $sessionfname = "Geuest";
        $sessionlname =  "User";
        $sessionemail =  "useremail@gmail.com";
    }
    require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Topbar start -->
    <div class="container bg-light">
        <div class="container-fluid border-bottom border-info mb-2">
            <div class="row py-2">
                <div class="col-sm-9">
                    <a href="/stms" class="text-info text-decoration-none"><h1>Store Management System</h1></a>
                </div>
                <div class="col-sm-3 d-flex justify-content-end mt-2">
                 <?php if($sessionfname == "Geuest"){
                    ?>
                    <a href="login.php" class="btn btn-info text-white">Login <i class="bi bi-door-open"></i>
                    </a>
                <?php
                 } else{

                 ?>
                 <p><?php echo $sessionfname." ".$sessionlname." "; ?>
                    <a href="/stms/logout.php" class="btn btn-info text-white">LogOut <i class="bi bi-box-arrow-right"></i>
                    </a>
                </p>
                <?php
                 }
                 ?>
                </div>
            </div>
            
        </div>
    <!-- Topbar End -->
   
