<!-- Header Require -->
<?php
    require('../header.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM product";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="container-fluid">
        <?php
            echo "<table border='1'> <tr> <th> Name </th> <th> Category </th> <th> Product Code </th> <th>Action </th> <tr>";
            while($data = mysqli_fetch_assoc($getdata)){
                $product_id  = $data['product_id'];
                $product_name = $data['product_name'];
                $product_category =  $data['product_category'];
                $sql = "SELECT * FROM category WHERE category_id='$product_category'";
                $getdata1 = mysqli_query($conn,$sql);
                $data1 = mysqli_fetch_assoc($getdata1);
                $category_name = $data1['category_name'];
                $product_code = $data['product_code'];
                $product_entrydate = $data['product_entrydate'];
                echo "<tr> <td>".$product_name."</td> <td> ".$category_name."</td> <td>".$product_code."</td> <td> <a href='edit_product.php?id=".$product_id."'> Edit </a> </td></tr>";
            }
            echo "</table>";
        ?>
    </div>
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

