<?php
require 'session.php';
require 'crud.php';
$oop = new CRUD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- DatePicker -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">    
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
               <ul class="dropdown-menu">
                   <li>
                   <?php 
                        while ($row = mysqli_fetch_array($mysql,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Expiring Product</li>";
                            echo "<li><a href='viewProduct'>".$row['name'].' '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct'>".$rows['name'].' '.$rows['packing']."</a></li>";
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
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-6"><i class="fa fa-fw fa-inbox"></i> Collections Receipt <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-6" class="collapse">
                        <li><a href="addCR"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewCR"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-7"><i class="fa fa-fw  fa-credit-card"></i> Credit/Debit Memo <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-7" class="collapse">
                        <li><a href="addCM"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewCM"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-8"><i class="fa fa-fw  fa-shopping-cart"></i> Purchase Orders<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-8" class="collapse">
                        <li><a href="addPO"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewPO"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-9"><i class="fa fa-fw  fa-ruble"></i> Expenses<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-9" class="collapse">
                        <li><a href="viewExCat"><i class="fa fa-align-left">&nbsp;</i>Expenses Category</a></li>
                        <li><a href="viewExList"><i class="fa fa-align-right">&nbsp;</i>Expeses List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-tags"></i> Sales <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="addInvoice"><i class="fa fa-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewInvoice"><i class="fa fa-list">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="addProduct"><i class="fa fa-plus">&nbsp;</i>Inventory In</a></li>
                        <li><a href="viewProduct"><i class="fa fa-list">&nbsp;</i>View</a></li>
                        <li><a href="viewInvOut"><i class="fa fa-minus">&nbsp;</i>Inventory Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="addCustomer"><i class="fa fa-user-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewCustomers"><i class="fa fa-users">&nbsp;</i>View</a></li>
                        <li><a href="viewCustPro"><i class="fa fa-user-circle">&nbsp;</i>Customers Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-id-card"></i> Employee <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="addEmployee"><i class="fa fa-user-plus">&nbsp;</i>Add </a></li>
                        <li><a href="viewEmployee"><i class="fa fa-users">&nbsp;</i>View </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-10"><i class="fa fa-fw fa-truck"></i> Suppliers <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-10" class="collapse">
                        <li><a href="addSup.php"><i class="fa fa-user-plus">&nbsp;</i>Add </a></li>
                        <li><a href="viewSup.php"><i class="fa fa-users">&nbsp;</i>View </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="addUser"><i class="fa fa-user-plus">&nbsp;</i>Add</a></li>
                        <li><a href="viewUser"><i class="fa fa-users">&nbsp;</i>View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings"><i class="fa fa-fw fa-cogs">&nbsp;</i>Settings</a>
                </li>
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
              <li class="active">Add Purchase Order</li>
              </ol>
              <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <?php
            if (isset($_POST['save'])) {
                $po = mysqli_real_escape_string($db,$_POST['po_no']);
                $td = mysqli_real_escape_string($db,$_POST['today']);
                $su = mysqli_real_escape_string($db,$_POST['supplier']);
                $tt = mysqli_real_escape_string($db,$_POST['total']);
                $pp = mysqli_real_escape_string($db,$_POST['prepared']);
                $nt = mysqli_real_escape_string($db,$_POST['note']);
                $sql=$oop->insertPO($po,$td,$su,$tt,$pp,$nt);
                if(!$sql){
                   ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Already P.O Added!</strong> Try Again.
                      </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Successfully P.O Added!</strong>
                      </div>
                  <?php
                }
            }
            ?>                 
                <center><p><li class="fa fa-shopping-cart fa-2x">&nbsp;</li><b style="font-size: 18px;">Order Products</b></p></center>
            </div>
        </div>
        <form method="POST" action="">
        <div class="row">
         <div class="col-sm-4">
             <div class="input-group">
                 <span class="input-group-addon">P.O No:</span>
                 <?php 
                    $sql = mysqli_query($db,"SELECT MAX(po_no) as Max FROM tbl_PO");
                    $row = mysqli_fetch_assoc($sql);
                    $max = $row['Max']+1;
                 ?>
                 <input type="number" step="any" id="po" name="po_no" class="form-control" value="<?php echo $max;?>" disabled>
             </div>
         </div>
         <div class="col-sm-5">
            
          </div>
          <div class="col-sm-3">
            <div class="input-group date form_date">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date:</span>
                <input name="today" id="dateToday" class="form-control" size="16" type="text" placeholder="">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Supplier:</span>
                    <select name="supplier" class="form-control">
                       <?php  
                        $sup = mysqli_query($db,"SELECT * FROM tbl_supplier");
                        while ($out = mysqli_fetch_array($sup)) {
                            echo "<option value=".$out['sup_id'].">".$out['sup_name']."</option>";
                        }
                       ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row"> 
          <div class="col-sm-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-sm-4">
                        <input type="text" placeholder="Product Name/Description" id="product" name="product" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="Maker" id="maker" name="maker">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Price">
                    </div>
                    <div class="col-sm-2">
                         <button class="btn btn-default form-control" type="button" id="add" name="addprod" id="addprod"><b class="fa fa-plus fa-bg">&nbsp;</b>Add</button>
                    </div>
                  </div>
                </div><!-- panel heading-->
              <div class="panel-body" style="height:300px; overflow-y: auto;">
                <div class="table-responsive">      
                  <table class="table table-hover table-fixed table-striped">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Product Description</th>
                        <th>Maker</th>
                        <th>Qty.</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>       
                </div>
              </div><!-- panel body-->
              </div><!-- panel-->
          </div> 
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-addon" >Total:</span>
                    <input name="total" type="number" step="any" class="form-control" id="totalAmount" required="">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-addon">Prepared By:</span>
                    <input type="text" name="prepared" class="form-control" value="<?php echo (string)$name;?>">
                </div>                
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-addon">Noted By:</span>
                    <input type="text"  name="note" class="form-control" required="">
                </div>
            </div>
            <div class="col-sm-3">
                <button type="submit" name="save" class="form-control btn btn-success"><b class="fa fa-save">&nbsp;</b>Save</button>
            </div>
        </div>
        </form>
            <!-- /.row -->
        <!-- /.container-fluid -->
     </div>

    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<script type="text/javascript">
        /*DatePicker*/
$(document).ready(function() {
  $('.form_date').datepicker({
      format: "yyyy/mm/dd",
      language: 'en-AU',
      todayHighlight: true,
      autoclose: true
    }).datepicker('setDate', new Date());
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
    function calc(){
        var a = parseFloat($("#total").val()) || 0;
        $("#totalAmount").val(a);
    }
    function viewData(){
        var po = $("#po").val();
        $.post('showjax.php', {po: po}, function(data, textStatus, xhr) {
            $("tbody").html(data);
            calc();
        });
    } 
    // viewData();
    $("#add").click(function(event) {
        var name = $("#product").val();
        var make = $("#maker").val();
        var qty = $("#qty").val();
        var price = $("#price").val();
        var po = $("#po").val();
        $.post('addjax.php', {addPO: 'addPO', nm: name, mk:make, qt:qty, pr:price,po:po}, function(data, textStatus, xhr) {
        $("#product").val('');
        $("#maker").val('');
        $("#qty").val('');
        $("#price").val('');
        viewData();
        });
    });
    $(document).on('click', '.btn-remove', function(event) {
        var pod = $(this).data('id');
        $.post('deljax.php', {remPO: 'remPO',pod:pod}, function(data, textStatus, xhr) {
            viewData();
        });
    });
});
    /**/
</script>
</body>
</html>