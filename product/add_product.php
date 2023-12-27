<!-- Header Require -->
<?php
    require('../header.php');
?>
<?php
   // This page Php Code here
   if(isset($_POST['submit'])){
     $product_name = $_POST['product_name'];
     $product_category = $_POST['category_id'];
     $product_code = $_POST['product_code'];
     $product_entrydate = date("Y-m-d");
     if(empty($product_name)){
        $prodnameerr = "Please Fill Product Name";
     }else if(empty($product_category)){
        $prodcateerr = "Please Fill Product Category";
     }else if(empty($product_code)){
        $prodcodeerr = "Please Fill Product Code";
     }
     else{
        $senddata = "INSERT INTO product (product_name,product_category,product_code,product_entrydate) 
                    VALUES ('$product_name','$product_category','$product_code','$product_entrydate')";
        if(mysqli_query($conn,$senddata)){
            header('location:list_of_product.php?msg=New Product Added succesfull');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
   }
}
?>

   
        <div class="row">
            <div class="col-sm-3">
                <?php include('../sidebar.php') ?>
            </div>

            <div class="col-sm-9">
            <div class="msg"> <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?> </div>
            <form action="add_product.php" method="POST">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" class="form-control"><br>
                    <label for="category_id">Product Category</label>
                        <select name="category_id" class="form-control">
                            <?php 
                                $sql = "SELECT * FROM category";
                                $getdata = mysqli_query($conn,$sql);
                                while($data = mysqli_fetch_assoc($getdata)){
                                    $category_name = $data['category_name'];
                                    $category_id = $data['category_id'];
                                    echo "<option value='".$category_id."'> ".$category_name." </option>";
                                }
                            ?>
                        </select>
                    <br>
                    <label for="product_code">Product Code</label>
                    <input type="text" name="product_code" class="form-control"><br>
                    <input type="submit" name="submit" value="Add Product" class="btn btn-info">
            </form>
            </div>
        </div>
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

