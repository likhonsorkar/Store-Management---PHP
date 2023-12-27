<!-- Header Require -->
<?php
    require('../../header.php');
?>
<?php
   // This page Php Code here
   if(isset($_POST['submit'])){
     $spend_product_name = $_POST['spend_product_name'];
     $spend_product_quientity = $_POST['spend_product_quientity'];
     $product_entrydate = date("Y-m-d");
     if(empty($spend_product_name)){
        echo $prodnameerr = "Please Fill Product Name";
     }else if(empty($spend_product_quientity)){
        echo $prodcateerr = "Please Fill Product Quientity";
     }else if(empty($product_entrydate)){
        echo $prodcodeerr = "Please choose valid date";
     }
     else{
        $senddata = "INSERT INTO spend_product (spend_product_name,spend_product_quientity,spend_product_date) 
                    VALUES ('$spend_product_name','$spend_product_quientity','$product_entrydate')";
        if(mysqli_query($conn,$senddata)){
            header('location:list_of_product_spend.php?msg=Product Store succesfull');
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
        <form action="product_spend.php" method="POST">
                <label for="spend_product_name">Product</label>
                    <select name="spend_product_name" class="form-control">
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
                <label for="spend_product_quientity">Quientity</label>
                <input type="text" name="spend_product_quientity" class="form-control"><br>
                <input type="submit" name="submit" value="Spend Product" class="btn btn-info">
        </form>
    </div>
    </div>
    
<!-- Footer Require -->
<?php
    require('../../footer.php');
?>

