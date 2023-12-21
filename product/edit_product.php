<!-- Header Require -->
<?php
    require('../header.php');
    require('../sessionchecker.php');
?>
<?php
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $getdata = "SELECT * FROM product WHERE product_id='$id'";
      $query = mysqli_query($conn,$getdata);
      $data = mysqli_fetch_assoc($query);
      $product_name = $data['product_name'];
      $product_category = $data['product_category'];
      $product_code = $data['product_code'];
   }
   // This page Php Code here
   if(isset($_POST['submit'])){
     $uproduct_name = $_POST['product_name'];
     $uproduct_category = $_POST['category_id'];
     $uproduct_code = $_POST['product_code'];
     $uproduct_entrydate = date("Y-m-d");
     if(empty($uproduct_name)){
        $prodnameerr = "Please Fill Product Name";
     }else if(empty($uproduct_category)){
        $prodcateerr = "Please Fill Product Category";
     }else if(empty($uproduct_code)){
        $prodcodeerr = "Please Fill Product Code";
     }
     else{
        $id = $_GET['id'];
        $updatedata = "UPDATE product SET product_name ='$uproduct_name',product_category='$uproduct_category',product_code='$uproduct_code' WHERE product_id='$id'";
        if(mysqli_query($conn,$updatedata)){
            header('location:list_of_product.php?msg=Product Update succesfull');
            exit();  
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
   }
}
?>
    <div class="container-fluid">
        <!-- Index Body Code Here -->
        <div class="msg"> <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?> </div>
        <form action="edit_product.php?id=<?php echo $id; ?>" method="POST">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="<?php echo $product_name ?>"><br>

            <label for="category_id">Product Category</label>
            <select name="category_id" class="form-control">
                <?php 
                    $sql = "SELECT * FROM category";
                    $getdata = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_assoc($getdata)){
                        $category_name = $data['category_name'];
                        $category_id = $data['category_id'];
                ?>
                <option value="<?php echo $category_id ?>" <?php if($category_id ==$product_category) echo "selected"; ?>>
                    <?php echo $category_name ?>
                </option>
                <?php
                    }
                ?>
            </select><br>

            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" class="form-control" value="<?php echo $product_code ?>"><br>

            <input type="submit" name="submit" value="Edit Product" class="btn btn-success">
        </form>

    </div>
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

