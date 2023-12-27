<!-- Header Require -->
<?php
    require('../../header.php');
?>
<?php
   if(isset($_GET['id'])){
      $id = $_GET['id'];
      $getdata = "SELECT * FROM spend_product WHERE spend_product_id='$id'";
      $query = mysqli_query($conn,$getdata);
      $data = mysqli_fetch_assoc($query);
      $spend_product_name = $data['spend_product_name'];
      $spend_product_quientity = $data['spend_product_quientity'];
   }
   // This page Php Code here
   if(isset($_POST['submit'])){
     $uspend_product_name = $_POST['spend_product_name'];
     $uspend_product_quientity = $_POST['spend_product_quientity'];
     if(empty($uspend_product_name)){
        $prodnameerr = "Please Fill Product Name";
     }else if(empty($uspend_product_quientity)){
        $prodcateerr = "Please Fill Product Category";
     }
     else{
        $id = $_GET['id'];
        $updatedata = "UPDATE spend_product SET spend_product_name ='$uspend_product_name',spend_product_quientity='$uspend_product_quientity' WHERE spend_product_id='$id'";
        if(mysqli_query($conn,$updatedata)){
            header('location:list_of_product_spend.php?msg=Product Update succesfull');
            exit();  
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
        <form action="edit_product_spend.php?id=<?php echo $id; ?>" method="POST">
            <label for="spend_product_name">Product</label>
            <select name="spend_product_name" class="form-control">
                <?php 
                    $sql = "SELECT * FROM product";
                    $getdata = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_assoc($getdata)){
                        $product_name = $data['product_name'];
                        $product_id  = $data['product_id'];
                ?>
                <option value="<?php echo $product_id?>" <?php if($product_id==$spend_product_name) echo "selected"; ?>>
                    <?php echo $product_name ?>
                </option>
                <?php
                    }
                ?>
            </select><br>

            <label for="spend_product_quientity">Quientity</label>
            <input type="text" name="spend_product_quientity" class="form-control" value="<?php echo $spend_product_quientity ?>"><br>

            <input type="submit" name="submit" value="Edit Spend Product" class="btn btn-info">
        </form>
    </div>
</div>
<!-- Footer Require -->
<?php
    require('../../footer.php');
?>

