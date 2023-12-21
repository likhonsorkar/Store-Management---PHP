<!-- Header Require -->
<?php
    require('../../header.php');
?>
<?php
   // This page Php Code here
   $sql = "SELECT * FROM store_product";
   $getdata = mysqli_query($conn,$sql);
?>
    <div class="container-fluid">
        <?php
            echo "<table border='1'> <tr> <th>Product Name </th> <th> Quientity </th> <th> Entry date </th> <th>Action </th> <tr>";
            while($data = mysqli_fetch_assoc($getdata)){
                $store_product_id  = $data['store_product_id'];
                $product_id  = $data['store_product_name'];
                $store_product_quientity = $data['store_product_quientity'];
                $store_product_entry_date =  $data['store_product_entry_date'];
                $sql = "SELECT * FROM product WHERE product_id='$product_id'";
                $getdata1 = mysqli_query($conn,$sql);
                $data1 = mysqli_fetch_assoc($getdata1);
                $product_name = $data1['product_name'];
                echo "<tr> <td>".$product_name."</td> <td> ".$store_product_quientity ."</td> <td>".$store_product_entry_date."</td> <td> <a href='edit_product_store.php?id=".$store_product_id."'> Edit </a> </td></tr>";
            }
            echo "</table>";
        ?>
    </div>
<!-- Footer Require -->
<?php
    require('../../footer.php');
?>

