<?php
require('header.php');

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
