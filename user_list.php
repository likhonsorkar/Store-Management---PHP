<!-- Header Require -->
<?php
    require('header.php');
    require('sessionchecker.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM user";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="row">
        <div class="col-sm-3">
            <?php require('sidebar.php') ?>
        </div>
        <div class="col-sm-9">
        <?php
            echo "<div class='table-responsive'><table class='table table-hover'> <thead>  <tr class='bg-info text-light'> <th> Name </th> <th> Email </th> <th>Action </th> </tr> </thead>";
            while($data = mysqli_fetch_assoc($getdata)){
                $fname= $data['fname'];
                $lname =  $data['lname'];
                $email = $data['email'];
                echo "<tbody><tr> <td>".$fname." ".$lname ."</td> <td> ".$email."</td> <td> <a class='btn btn-info' href='#'> Reset Password </a> <a class='btn btn-danger' href='#'> Delete User </a> </td></tr></tbody>";
            }
            echo "</table> </div>";
        ?>
    </div>
    </div>
<!-- Footer Require -->
<?php
    require('footer.php');
?>

