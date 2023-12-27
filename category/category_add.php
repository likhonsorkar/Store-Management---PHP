<!-- Header Require -->
<?php
    require('../header.php');
?>
<?php
   // This page Php Code here
   if(isset($_POST['submit'])){
     $category_name = $_POST['category_name'];
     $category_entrydate = date("Y-m-d");
     if(empty($category_name)){
        $caterr = "Please Fill category Name";
     }else{
        $senddata = "INSERT INTO category (category_name,category_entrydate) VALUES ('$category_name','$category_entrydate')";
        if(mysqli_query($conn,$senddata)){
            header('location:category_add.php?msg=New Category $categoryname Added succesfull');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
   }
}
?>  
    <div class="row">
        <div class="col-sm-3">
                <?php include('../sidebar.php'); ?>
        </div>
        <div class="col-sm-9">
        <!-- Index Body Code Here -->
        <div class="msg"> <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?> </div>
        <form action="category_add.php" method="POST">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control"><br>
                <input type="submit" name="submit" value="Add Category" class="btn btn-info">
        </form>
    </div>
    </div>
    
<!-- Footer Require -->
<?php
    require('../footer.php');
?>

