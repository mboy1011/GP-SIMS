<?php
include 'session.php';
include 'crud.php';
$oop = new CRUD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fixedColumns.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">
    <!-- DatePicker -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker3.min.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-brand">
            <img src="../img/logo.png" alt="Company Logo" style="height:55px;width: 55px;">   
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">       
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="not"><i class="fa fa-bell fa-lg"></i><span class="label label-warning badge" id="notify">
                    <?php
                        echo $counting0;
                    ?>
                    </span>
                </a> 
               <ul class="dropdown-menu scrollables-menu" >
                   <li>
                   <?php 
                        while ($row = mysqli_fetch_array($mysql,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Expiring Product</li>";
                            echo "<li><a href='viewProduct'>".$row['name'].' ('.$row['lot_no'].') '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct'>".$rows['name'].' ('.$rows['lot_no'].') '.$rows['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql3,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Overdue</li>";
                            echo "<li><a href='viewInvoice'>Sales No. ".sprintf('%04d',$rows['sales_no'])."</a></li>";
                        }
                   ?>
                   </li>
                   <li class='divider'></li>
               </ul>
            </li>        
            <li>
                    <a href="index"><i class="fa fa-fw fa-tachometer">&nbsp;</i>Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><?php echo $name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="viewCR"><i class="fa fa-fw fa-inbox"></i> Collections Receipt</a>
                </li>
                <li>
                    <a href="viewCM"><i class="fa fa-fw  fa-credit-card"></i> Credit/Debit Memo </a>
                </li>
                <li>
                    <a href="viewPO"><i class="fa fa-fw  fa-shopping-cart"></i> Purchase Orders</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-9"><i class="fa fa-fw  fa-ruble"></i> Expenses<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-9" class="collapse">
                        <li><a href="viewExCat"><i class="fa fa-align-left">&nbsp;</i>Expenses Category</a></li>
                        <li><a href="viewExList"><i class="fa fa-align-right">&nbsp;</i>Expeses List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="viewInvoice"><i class="fa fa-fw fa-tags"></i> Sales</i></a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="viewProduct"><i class="fa fa-list">&nbsp;</i>View</a></li>
                        <li><a href="viewInvOut"><i class="fa fa-minus">&nbsp;</i>Inventory Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="viewCustomers"><i class="fa fa-users">&nbsp;</i>View</a></li>
                        <li><a href="viewCustPro"><i class="fa fa-user-circle">&nbsp;</i>Customers Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="viewSup"><i class="fa fa-fw fa-truck"></i> Suppliers</a>
                </li>
                <?php 
                if ($user_type=='admin') {
                ?>
                <li>
                    <a href="viewEmployee"><i class="fa fa-fw fa-id-card"></i> Employee</a>
                </li>
                <li>
                    <a href="viewUser" ><i class="fa fa-fw fa-user">&nbsp;</i> Users</a>
                </li>
                <li>
                    <a href="settings"><i class="fa fa-fw fa-cogs">&nbsp;</i>Settings</a>
                </li>
                <?php 
                }
                 ?>
                <li>
                    <hr>
                    <center>
                        <div class="container-fluid" style="color: #fff;">
                            <p><b style="font-size:16px;">Golden Pharmaceutical</b><br>
                            <i style="font-size: 10px;">Bolonsiri Road, Camaman-an,</i><br><i style="font-size: 9px"> Cagayan De Oro City</i><br><i style="font-size: 8px;">Telefax (088) 857-3088</i></p> 
                             <p>All Rights Reserved 2017.</p>   
                        </div>
                    </center>                    
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">Product Lists</li>
              </ol>
              <hr>
            </div>
        </div>
<?php
    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($db,$_POST['id']);
        $proname = mysqli_real_escape_string($db,$_POST['proname']);
        $desc = mysqli_real_escape_string($db,$_POST['desc']);
        $lot = mysqli_real_escape_string($db,$_POST['lot']);
        $price = mysqli_real_escape_string($db,$_POST['price']);
        $exp = mysqli_real_escape_string($db,$_POST['exp']);
        $pack = mysqli_real_escape_string($db,$_POST['pack']);
        $qty = mysqli_real_escape_string($db,$_POST['qty']);
        $sql = $oop->upPro($id,$proname,$desc,$lot,$price,$exp,$pack,$qty);
        if(!$sql){
                   ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Update!</strong> Try Again.
                      </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Updated!</strong>
                      </div>
                  <?php
                }
    }
    if (isset($_POST['delete'])) {
        $did = mysqli_real_escape_string($db,$_POST['delid']);
        $sql = $oop->delPro($did);
        if(!$sql){
           ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Customer!</strong> Try Again.
              </div>
          <?php
        }else{
            ?>
              <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Deleted!</strong>
              </div>
          <?php
        }
    }
?>      <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"><a href="addProduct"><button class="btn btn-info form-control"> <i class="fa fa-plus">&nbsp;</i>Add Product</button></a></div>
        </div>  
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Lot No.</th>
                            <th>Price</th>  
                            <th>Expiration Date</th>
                            <th>Packing</th>
                            <th>Quantity/BOX</th>
                            <th>Status</th>
                            <th>Date Added</th>                       
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT * FROM tbl_products") or die(mysql_error());
                      $i=1;
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>            
                            <td><?php echo $row['lot_no']; ?></td>  
                            <td>₱&nbsp;<?php echo number_format($row['price'],2); ?></td>    
                            <td><?php echo $row['expiry_date']; ?></td>    
                            <td><?php echo $row['packing']; ?></td>    
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php
                             if ($row['status']=='STOCKS ON HAND') {
                              ?>
                               <span class="label label-success"><?php echo $row['status'];?></span>
                              <?php
                             }else if($row['status']=='OUT OF STOCKS'){
                              ?>
                               <span class="label label-warning"><?php echo $row['status'];?></span>
                              <?php
                             }else{
                              ?>
                               <span class="label label-danger"><?php echo $row['status'];?></span>
                              <?php
                             }
                             ?>
                             </td>
                            <td><?php echo $row['timestamp']; ?></td>    
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edits btn btn-warning btn-xs" data-id="<?php echo $row['prod_id'];?>" data-name="<?php echo $row['name'];?>" data-desc="<?php echo $row['description'];?>" data-lot="<?php echo $row['lot_no'];?>" data-price="<?php echo $row['price'];?>" data-expd="<?php echo $row['expiry_date'];?>" data-pack="<?php echo $row['packing'];?>" data-qty="<?php echo $row['quantity'];?>" data-title="Edit"  data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                              <?php 
                              if ($user_type=='admin') {
                              ?>
                                <b data-placement="top" title="Delete"><button class="btn-deletes btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['prod_id']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
                              <?php 
                              }
                              ?>
                            </td> 
                          </tr>
                      <?php } ?>
                    </tbody>
                </table>            
                </div>
          </div>
        </div>
<!-- Update -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Product Details</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
                <input type="hidden" name="id" id="prodid">
                <input type="text" id="pname" name="proname" placeholder="Product Name" class="form-control" required="">
                <input type="text" id="pdesc" name="desc" placeholder="Description" class="form-control">
                <input type="text" id="plot" name="lot" placeholder="Lot No." class="form-control">
                <input type="number" step="any" id="pprice" name="price" placeholder="Price" class="form-control">
                <div class="input-group date form_date">
                    <span class="input-group-addon">Expiration Date:</span>
                    <input name="exp" id="pexpd" class="form-control" size="16" type="text" placeholder="">
                </div>
                <input type="text" id="ppack" name="pack" placeholder="Packing" class="form-control">
                <input type="text" id="pqty" name="qty" placeholder="Quantity" class="form-control">
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="submit" name="update"><b class="fa fa-pencil-square-o fa-bg">&nbsp;</b>Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>

  </div>
</div>  
<!-- Delete -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Product</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
                <input type="hidden" name="delid" id="pdel">
                <b><strong>Are you sure do you want to delete this product?</strong></b>
      </div>
      <div class="modal-footer">
            <button class="btn btn-danger" type="submit" name="delete"><b class="fa fa-trash fa-bg">&nbsp;</b>Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>

  </div>
</div>
            <!-- /.row -->
        <!-- /.container-fluid -->
     </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>

<!-- DatePicker -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datatables').dataTable({
       "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:{
            leftColumns: 2
        },
        "oLanguage": {
          "sSearch": "<b class='fa fa-search fa-lg'>&nbsp;</b>",
          "sLengthMenu": "<b id='data-menu'><b class='fa fa-eye fa-lg'>&nbsp;</b>Show _MENU_ records</b>&nbsp;"
        },
        "pagingType": "full_numbers",
        dom: 'lBfrtip',
        buttons: [
            {
              "extend":'copy', "text":'<span class="fa fa-copy fa-lg">&nbsp;</span>Copy',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'excel', "text":'<span class="fa fa-file-excel-o fa-lg">&nbsp;</span>Excel',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'pdf', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs' 
            }
        ]
    });
      var date = new Date();
      var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      $('.form_date').datepicker({
        format: "yyyy/mm/dd",
        language: 'en-AU',
        todayHighlight: true,
        setDate: today,
        autoclose: true
      });
    $('.btn-edits').click(function(event) {
        var prodid = $(this).data("id");
        var name = $(this).data("name");
        var desc = $(this).data("desc");
        var lot = $(this).data("lot");
        var expd = $(this).data("expd");
        var price = $(this).data("price");
        var pack = $(this).data("pack");
        var qty = $(this).data("qty");
        $("#prodid").val(prodid);
        $("#pname").val(name);
        $("#pdesc").val(desc);
        $("#plot").val(lot);
        $("#pexpd").val(expd);
        $("#pprice").val(price);
        $("#ppack").val(pack);
        $("#pqty").val(qty);
    });
    $('.btn-deletes').click(function(event) {
       var did = $(this).data("did");
       $("#pdel").val(did);
    });
    $("#not").click(function(event) {
        $("#notify").hide();
    });
    function check() {
        var val = $("#notify").text();
        if (val==0) {
            $("#notify").hide();
        }
    }
    check();    
});
</script>
</body>
</html>