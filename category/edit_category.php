<!-- Header Require -->
<?php
    require('../header.php');
    require('../sessionchecker.php');
?>

<?php
   // Check if the 'id' parameter is set in the URL
   if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM category WHERE category_id='$id'";
        $query = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($query);
        $viewcatname = $data['category_name'];

        // Check if the form is submitted
        if(isset($_POST['submit'])){
            $ucategory_name = $_POST['category_name'];

            // Check if the category name is empty
            if(empty($ucategory_name)){
                echo $caterr = "Please Fill category Name";
            } else {
                // Update the category in the database
                $sql = "UPDATE category SET category_name = '$ucategory_name' WHERE category_id='$id'";
                if($query = mysqli_query($conn, $sql)){
                    header('location:category_list.php?msg=Category Update Successful');
                    exit();  // Exit to avoid further execution after redirect
                } else {
                    header('location:edit_category.php?id='.$id.'&msg=Category Update Not Successful');
                    exit();  // Exit to avoid further execution after redirect
                }
            }
        }
   }
?>

<div class="container-fluid">
    <!-- Index Body Code Here -->
    <div class="msg"> 
        <?php if(isset($_GET['msg'])){
            echo $_GET['msg'];
        }  
        ?> 
    </div>
    <form action="edit_category.php?id=<?php echo $id; ?>" method="POST">
        <label for="category_name">Category Name</label>
        <input type="text" name="category_name" class="form-control" value="<?php echo $viewcatname; ?>"><br>
        <input type="submit" name="submit" value="Edit Category" class="btn btn-success">
    </form>
</div>

<!-- Footer Require -->
<?php
    require('../footer.php');
?>
