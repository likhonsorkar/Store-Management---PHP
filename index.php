<!-- Header Require -->
<?php
    require('header.php');
?>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 bg-light p-0 m-0">
                    <?php include('sidebar.php') ?>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                
                    </div>
                    <div class="row ml-3">
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/category/category_add.php">
                                <i class="fa-solid fa-folder-plus fa-6x text-info"></i>
                            </a>
                            <p>Add Category</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/category/category_list.php">
                                <i class="fa-regular fa-folder-open fa-6x text-info"></i>
                            </a>
                            <p>Category List</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/product/add_product.php">
                                <i class="fa-solid fa-box-open fa-6x text-info"></i>
                            </a>
                            <p>Add Product</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/product/list_of_product.php">
                                <i class="fa-solid fa-bars-staggered fa-6x text-info"></i>
                            </a>
                            <p>Product List</p>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/product/store/product_store.php">
                                <i class="fa-solid fa-trash-can-arrow-up fa-6x text-info"></i>
                            </a>
                            <p>Store Product</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/product/store/list_of_product_store.php">
                                <i class="fa-solid fa-box fa-6x text-info"></i>
                            </a>
                            <p>Store List</p>
                        </div>
                       
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/product/spend/product_spend.php">
                                <i class="fa-solid fa-share-from-square fa-6x text-info"></i>
                            </a>
                            <p>Spend Product</p>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a href="/stms/product/spend/list_of_product_spend.php">
                                <i class="fa-solid fa-list-ol fa-6x text-info"></i>
                            </a>
                            <p>Spend List</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Footer Require -->
<?php
    require('footer.php');
?>