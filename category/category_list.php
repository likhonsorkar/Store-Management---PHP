<!-- Header Require -->
<?php
    require('../header.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM category";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="container-fluid">
        <?php
            echo "<table border='1'> <tr> <th> Name </th> <th> Date </th> <th>Action </th> <tr>";
            while($data = mysqli_fetch_assoc($getdata)){
                $category_name = $data['category_name'];
                $category_entrydate =  $data['category_entrydate'];
                $category_id = $data['category_id'];
                echo "<tr> <td>".$category_name ."</td> <td> ".$category_entrydate."</td> <td> <a href='edit_category.php?id=".$category_id."'> Edit </a> </td></tr>";
            }
            echo "</table>";
        ?>
    </div>
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

