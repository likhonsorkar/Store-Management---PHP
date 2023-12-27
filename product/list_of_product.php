<!-- Header Require -->
<?php
    require('../header.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM product";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="row">
        <div class="col-sm-3">
            <?php include('../sidebar.php') ?>
        </div>
        <div class="col-sm-9">
        <?php
            echo "<div class='table-responsive'><table class='table table-hover'> <thead>  <tr class='bg-info text-light'> <th> Name </th> <th> Category </th> <th> Product Code </th> <th>Action </th> <tr> <thead>";
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
                echo "<tbody><tr> <td>".$product_name."</td> <td> ".$category_name."</td> <td>".$product_code."</td> <td> <a class='btn btn-info' href='edit_product.php?id=".$product_id."'> Edit </a> </td></tr></tbody>";
            }
            echo "</table>";
        ?>
    </div>
    </div>
    
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

