<!-- Header Require -->
<?php
    require('../../header.php');
    require('../../sessionchecker.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM spend_product";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="row">
        <div class="col-sm-3">
                    <?php include('../../sidebar.php') ?>
        </div>
        <div class="col-sm-9">
            <?php
                echo "<div class='table-responsive'><table class='table table-hover'> <thead> <tr class='bg-info text-white'> <th>Product Name </th> <th> Spend </th> <th> Entry date </th> <th>Action </th> <tr> <thead>";
                while($data = mysqli_fetch_assoc($getdata)){
                    $spend_product_id  = $data['spend_product_id'];
                    $product_id  = $data['spend_product_name'];
                    $spend_product_quientity = $data['spend_product_quientity'];
                    $spend_product_entry_date =  $data['spend_product_date'];
                    $sql = "SELECT * FROM product WHERE product_id='$product_id'";
                    $getdata1 = mysqli_query($conn,$sql);
                    $data1 = mysqli_fetch_assoc($getdata1);
                    $product_name = $data1['product_name'];
                    echo "<tbody><tr> <td>".$product_name."</td> <td> ".$spend_product_quientity ."</td> <td>".$spend_product_entry_date."</td> <td> <a class='btn btn-info' href='edit_product_spend.php?id=".$spend_product_id."'> Edit </a> </td></tr> </tbody>";
                }
                echo "</table> </div>";
            ?>
        </div>
    </div>
<!-- Footer Require -->
<?php
    require('../../footer.php');
?>

