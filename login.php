<?php
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
<?php
if(isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['email'])){
    header('location:index.php');
}

$emailerr = $passworderr = $email = $successmsg = $loginerrmsg = '';

if (isset($_COOKIE['useremail']) && isset($_COOKIE['userpassword'])) {
    $coockieuseremail = $_COOKIE['useremail'];
    $coockieuserpassword = $_COOKIE['userpassword'];
    login($coockieuseremail, $coockieuserpassword, $conn,"Session Expired Please Login<br>");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (empty($email)) {
        $emailerr = "Email Required";
    }
    if (empty($password)) {
        $passworderr = "Password Required";
    }
    if (!empty($email) && !empty($password)) {
        $password = md5($password);
        if (isset($_POST['remember']) && $_POST['remember'] == "checked") {
            setcookie('useremail', $email, time() + (3600 * 24 * 365), '/');
            setcookie('userpassword', $password, time() + (3600 * 24 * 365), '/');
        }

        login($email, $password, $conn, "Email or Password is wrong!<br>");
    }
}
function login($useremail, $usermd5password, $conn,$loginerrrmsg)
{
    $email = $useremail;
    $password = $usermd5password;
    $sqlcheck = "SELECT * FROM user WHERE email ='$email' and password = '$password'";
    $checkquery = mysqli_query($conn, $sqlcheck);

    if (mysqli_num_rows($checkquery) > 0) {
        $row = $checkquery->fetch_assoc();
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['email'] = $row['email'];
        header('location:index.php?loginsuccess');
    } else {
        global $loginerrmsg;
        $loginerrmsg = $loginerrrmsg;;
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                
                <span class="text-danger"><?php echo $loginerrmsg; ?></span>
                <label for="email" class="form-label mt-2">Email: </label>
                <span class="text-danger">*<?php echo $emailerr; ?></span>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <label for="password" class="form-label mt-2">Password: </label>
                <span class="text-danger">*<?php echo $passworderr; ?></span>
                <input type="password" name="password" class="form-control">
                <label>
                    <input type="checkbox" name="remember" value="checked" checked> Remember me
                </label> <br>
                <button type="submit" class="mt-2 btn btn-info" name="submit">Login</button>
            </form>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>

<?php
require('footer.php');
?>
