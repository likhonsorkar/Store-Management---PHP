<!-- Header Require -->
<?php
    require('../header.php');
    require('../sessionchecker.php');
?>
   <div class="row">
        <div class="col-sm-3">
            <?php include('../sidebar.php'); ?>
        </div>
        <div class="col-sm-9">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <label for="product_id"><strong>Select Product</strong></label>
                <select name="product_id">
                    <?php
                        $sql = "SELECT * FROM product";
                        $getdata = mysqli_query($conn,$sql);
                        while($data = mysqli_fetch_assoc($getdata)){
                            $product_id  = $data['product_id'];
                            $product_name = $data['product_name'];
                            echo "<option value='$product_id'>$product_name</option>";
                        }
                    ?>
                </select>
                <button class="btn btn-info">Generate Report</button>
                <?php 
                    if(isset($_GET['product_id'])){
                        $report_product_id = $_GET['product_id'];
                        $sqlname = "SELECT * FROM product WHERE product_id='$report_product_id'";
                        $getdataname = mysqli_query($conn,$sqlname);
                        $dataname = mysqli_fetch_assoc($getdataname);
                        $product_name = $dataname['product_name'];
                        ?>
                </form>
                
            <div id="printarea">
            <h3><br>Report for: <?php echo $product_name; ?></h3>
                        <br>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Store Product Report</h4>
                        <?php
                        if(isset($_GET['product_id'])){
                            $store_product_query_id=$_GET['product_id'];
                            $sql1 = "SELECT * FROM store_product WHERE store_product_name=$store_product_query_id";
                            $getdata1 = mysqli_query($conn,$sql1);
                            $totalstore = 0;
                            echo "<div class='table-responsive'><table class='table table-hover'> <thead> <tr> <th> Entry date </th> <th> Store  </th>  <tr> </thead>";
                            while($data = mysqli_fetch_assoc($getdata1)){
                                $store_product_quientity = $data['store_product_quientity'];
                                $store_product_entry_date =  $data['store_product_entry_date'];
                                $totalstore = $totalstore +  $store_product_quientity;
                                echo "<tbody><tr> <td> ".$store_product_entry_date."</td> <td>".$store_product_quientity."</td> </tr></tbody>";
                            }
                            echo "<tbody><tr> <td> Total </td> <td>".$totalstore."</td> </tr></tbody></table></div>";
                        }else{
                            echo "Select Product to generate store product report<br>";
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <h4>Spend Product Report</h4>
                        <?php
                        if(isset($_GET['product_id'])){
                            $spend_product_query_id=$_GET['product_id'];
                            $sql2 = "SELECT * FROM spend_product WHERE spend_product_name=$spend_product_query_id";
                            $getdata2 = mysqli_query($conn,$sql2);
                            $totalspend = 0;
                            echo "<div class='table-responsive'><table class='table table-hover'> <thead> <tr> <th> Entry date</th> <th>Spend</th> <tr> <thead>";
                            while($data = mysqli_fetch_assoc($getdata2)){
                                $spend_product_quientity = $data['spend_product_quientity'];
                                $spend_product_entry_date =  $data['spend_product_date'];
                                $totalspend = $totalspend + $spend_product_quientity;
                                echo "<tbody><tr>  <td> ".$spend_product_entry_date."</td> <td>".$spend_product_quientity."</td> </tr> </tbody>";
                            }
                            echo "<tbody><tr> <td> Total </td> <td>".$totalspend."</td> </tr></tbody></table> </div>";
                        }else{
                            echo "Select Product to generate spend product report<br>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Now Avaiable in store : <?php $avstore = $totalstore - $totalspend; echo $avstore; ?></h4>  
                    </div>
                </div>
            </div>
            <button id="printbtn" class="btn btn-info" onclick="printDiv('printarea');"><i class="bi bi-printer"></i>
 Print Report</button>
            <?php
                }  
            ?>
        </div>
    
   </div>
   <script>
    function printDiv($divName) {
     var printContents = document.getElementById($divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
   </script>
<!-- Footer Require -->
<?php
    require('../footer.php');
?>