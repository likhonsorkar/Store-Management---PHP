<!-- Header Require -->
<?php
    require('../header.php');
    require('../sessionchecker.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM category";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="row">
        <div class="col-sm-3">
            <?php require('../sidebar.php') ?>
        </div>
        <div class="col-sm-9">
        <?php
            echo "<div class='table-responsive'><table class='table table-hover'> <thead>  <tr class='bg-info text-light'> <th> Name </th> <th> Date </th> <th>Action </th> </tr> </thead>";
            while($data = mysqli_fetch_assoc($getdata)){
                $category_name = $data['category_name'];
                $category_entrydate =  $data['category_entrydate'];
                $category_id = $data['category_id'];
                echo "<tbody><tr> <td>".$category_name ."</td> <td> ".$category_entrydate."</td> <td> <a class='btn btn-info' href='edit_category.php?id=".$category_id."'> Edit </a> </td></tr></tbody>";
            }
            echo "</table> </div>";
        ?>
    </div>
    </div>
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

