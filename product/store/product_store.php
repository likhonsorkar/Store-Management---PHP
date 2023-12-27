<!-- Header Require -->
<?php
    require('../../header.php');
?>
<?php
   // This page Php Code here
   if(isset($_POST['submit'])){
     $product_id = $_POST['product_id'];
     $store_product_quientity = $_POST['store_product_quientity'];
     $product_entrydate = date("Y-m-d");
     if(empty($product_id)){
        $prodnameerr = "Please Fill Product Name";
     }else if(empty($store_product_quientity)){
        $prodcateerr = "Please Fill Product Quientity";
     }else if(empty($product_entrydate)){
        $prodcodeerr = "Product entrydate is invalid";
     }
     else{
        $senddata = "INSERT INTO store_product (store_product_name,store_product_quientity,store_product_entry_date) 
                    VALUES ('$product_id','$store_product_quientity','$product_entrydate')";
        if(mysqli_query($conn,$senddata)){
            header('location:list_of_product_store.php?msg=Product Store succesfull');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
   }
}
?>
    <div class="row">
        <div class="col-sm-3">
            <?php include('../../sidebar.php') ?>
        </div>
        <div class="col-sm-9">
        <!-- Index Body Code Here -->
        <div class="msg"> <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?> </div>
            <form action="product_store.php" method="POST">
                    <label for="product_id">Product</label>
                        <select name="product_id" class="form-control">
                            <?php 
                                $sql = "SELECT * FROM product";
                                $getdata = mysqli_query($conn,$sql);
                                while($data = mysqli_fetch_assoc($getdata)){
                                    $product_name = $data['product_name'];
                                    $product_id  = $data['product_id'];
                                    echo "<option value='".$product_id."'> ".$product_name." </option>";
                                }
                            ?>
                        </select>
                    <br>
                    <label for="store_product_quientity">Quientity</label>
                    <input type="text" name="store_product_quientity" class="form-control"><br>
                    <input type="submit" name="submit" value="Store Product" class="btn btn-info">
            </form>
        </div>
    </div>
    
<!-- Footer Require -->
<?php
    require('../../footer.php');
?>

