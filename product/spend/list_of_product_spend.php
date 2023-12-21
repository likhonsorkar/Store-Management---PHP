<!-- Header Require -->
<?php
    require('../../header.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM spend_product";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="container-fluid">
        <?php
            echo "<table border='1'> <tr> <th>Product Name </th> <th> Spend </th> <th> Entry date </th> <th>Action </th> <tr>";
            while($data = mysqli_fetch_assoc($getdata)){
                $spend_product_id  = $data['spend_product_id'];
                $product_id  = $data['spend_product_name'];
                $spend_product_quientity = $data['spend_product_quientity'];
                $spend_product_entry_date =  $data['spend_product_date'];
                $sql = "SELECT * FROM product WHERE product_id='$product_id'";
                $getdata1 = mysqli_query($conn,$sql);
                $data1 = mysqli_fetch_assoc($getdata1);
                $product_name = $data1['product_name'];
                echo "<tr> <td>".$product_name."</td> <td> ".$spend_product_quientity ."</td> <td>".$spend_product_entry_date."</td> <td> <a href='edit_product_spend.php?id=".$spend_product_id."'> Edit </a> </td></tr>";
            }
            echo "</table>";
        ?>
    </div>
<!-- Footer Require -->
<?php
    require('../../footer.php');
?>

