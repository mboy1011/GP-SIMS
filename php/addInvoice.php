<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en-150">
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- DatePicker -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker3.min.css">
 <meta name="viewport" content="width=device-width,initial-scale=1.0">
 </head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-brand">
            <b style="background-color: transparent;font-family: 'Impact', Georgia, sans-serif;"><b class="fa fa-address-book-o fa-bg" style="font-size: 50px;"></b>|<i>SIMS</i></b>
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
            <li>
                    <a href="index.php"><i class="fa fa-fw fa-tachometer">&nbsp;</i>Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><?php echo $name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="collections.php"><i class="fa fa-fw fa-inbox">&nbsp;</i> Collections</a>
                </li>
                <li>
                    <a href="viewPayments.php"><i class="fa fa-fw fa-credit-card fa-bg">&nbsp;</i>Payment Reports</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-tags"></i> Sales <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="addInvoice.php"><i class="fa fa-plus">&nbsp;</i>Add Invoice</a></li>
                        <li><a href="viewInvoice.php"><i class="fa fa-list">&nbsp;</i>Sales Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="addProduct.php"><i class="fa fa-plus">&nbsp;</i>Add Products</a></li>
                        <li><a href="viewProduct.php"><i class="fa fa-list">&nbsp;</i>List Products</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="addCustomer.php"><i class="fa fa-user-plus">&nbsp;</i>Add Customer</a></li>
                        <li><a href="viewCustomers.php"><i class="fa fa-users">&nbsp;</i>View Customers</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-id-card"></i> Employee <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="addEmployee.php"><i class="fa fa-user-plus">&nbsp;</i>Add Employees</a></li>
                        <li><a href="viewEmployee.php"><i class="fa fa-users">&nbsp;</i>View Employees</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="addUser.php"><i class="fa fa-user-plus">&nbsp;</i>Add Users</a></li>
                        <li><a href="viewUser.php"><i class="fa fa-users">&nbsp;</i>View Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings.php"><i class="fa fa-fw fa-cogs">&nbsp;</i> Settings</a>
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
          <div class="col-sm-12">
              <ol class="breadcrumb">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">Add Invoice</li>
              </ol>
              <hr>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3>CASH SALES INVOICE</h3>
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5">
            <form method="POST" action=""> 
                <div class="input-group">
                <span class="input-group-addon">Choose Customer:</span>
                 <select name="userid" class="form-control" >
                          <?php
                            $result =mysqli_query($db, "SELECT cus_id,full_name FROM tbl_customers");
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              echo"<option value='$row[cus_id]'>";
                              echo $row['full_name'];
                              echo"</option>";
                            }
                          ?>
                 </select> 
                     <span class="input-group-btn">
                       <button class="btn btn-default" type="submit" name="go">Submit!</button>
                     </span>
                 </div>
            </form> 
            </div>
            <div class="col-sm-2">
                        
            </div>
            <div class="col-sm-5"></div>
        </div>
        <hr>
        <?php 
        if (isset($_POST['go'])) {
            $cust_id=mysqli_real_escape_string($db,$_POST['userid']);
            $result = mysqli_query($db,"SELECT * FROM tbl_customers WHERE cus_id=$cust_id");
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        ?>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">SOLD to</span>
                    <input type="hidden" id="custid" value="<?php echo $row['cus_id'];?>" name="c">
                    <input type="text"  name="sold" class="form-control" value="<?php echo $row['full_name'];?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group date form_date">
                    <span class="input-group-addon" >Date:</span>
                    <input name="today" id="dateToday" class="form-control" size="16" type="text" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">TIN/SC-TIN</span>
                    <input type="text" name="tin" value="<?php echo $row['tin'];?>" class="form-control">
                </div>             
            </div>
            <div class="col-sm-4">
                <div class="input-group">
            <?php
            $max =   mysqli_query($db,"SELECT MAX(sales_no) as max_id FROM tbl_sales");     
            $rowss = mysqli_fetch_assoc($max); 
            $max_id=$rowss['max_id']+1;      
            ?>
                    <span class="input-group-addon">No.</span>
                    <input type="text"  name="sold" value='<?php echo $max_id;?>' id="salesno" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Address</span>
                    <input type="text" step="any" name="address" value="<?php echo $row['address'];?>" class="form-control">
                </div>
            </div>                
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Terms</span>
                    <input type="text" id="terms1" step="any" value="<?php echo $row['terms'];?>" name="terms" class="form-control">
                </div>
            </div>                
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Business Style</span>
                    <input type="text" step="any" value="<?php echo $row['bstyle'];?>" name="bstyle" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">OSCA/PWD ID No.</span>
                    <input type="text" step="any" name="oidno" value="<?php echo $row['opidno'];?>" class="form-control">
                </div>
            </div>                
        </div>
        <?php
        }
        ?>
        <hr>
        <div class="row">      
            <div class="col-sm-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="input-group">
                        <span class="input-group-addon">Choose Products:</span>
                         <select name="userid" class="form-control" id="cprod">
                                  <?php
                                    $result =mysqli_query($db, "SELECT prod_id,name FROM tbl_products");
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                      echo"<option value='$row[prod_id]'>";
                                      echo $row['name'];
                                      echo"</option>";
                                    }
                                  ?>
                         </select>
                         </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity">
                    </div>
                    <div class="col-sm-2">
                         <button class="btn btn-default form-control" type="submit" name="addprod" id="addprod"><b class="fa fa-plus fa-bg">&nbsp;</b>Add</button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /panel-heading -->
            <div class="panel-body" style="height: 200px;overflow-y: auto;">
                <div class="table-responsive">             
                    <table class="table table-hover table-fixed table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Product Description</th>
                                <th>Lot No.</th>
                                <th>Expiry</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                </div><!--  panel-body end -->
            </div><!--  panel end -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Less: VAT </span>
                    <input type="number" id="vat" step="any" name="vat" value="12" class="form-control">
                    <span class="input-group-addon">%</span>
                </div>
            </div>
            <div class="col-sm-4">      
                <div class="input-group">
                    <span class="input-group-addon">Amount Net of VAT</span>
                    <input type="text" readonly="" id="net" step="any" name="net" class="element form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Discount:</span>
                    <input type="text" readonly="" id="discount" step="any" name="discount" class="element form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">TOTAL AMOUNT DUE:</span>
                    <input type="text"  readonly="" id="totalamountDUE"  name="tad" class="element form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Total Sales</span>
                    <input type="text" id="tsales" readonly="" name="tsales" class="element form-control">
                </div>
            </div>
        </div><!-- /.row -->
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="result">
                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>Prepared By:</label>
                <input type="text" style="border-top: 0;border-right: 0;border-left: 0;"  value="<?php echo $name?>"  name="prepareby" id="preby" class="element form-control">
            </div>
            <div class="col-sm-3">
                <label>Checked By:</label>
                <input type="text" style="border-top: 0;border-right: 0;border-left: 0;" value="<?php echo $name?>"  name="checkby" id="checkby" class="element form-control">
            </div>
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-3">
                <button type="submit" id="save" class="btn btn-success form-control"><b class="fa fa-save fa-bg">&nbsp;</b>Save</button>
            </div>
            <!-- <form method="POST" action="print.php">
            <div class="col-sm-3">
                <input type="hidden" name="sales_no" id="printed">
                <button type="submit" id="print" name="print" class="btn btn-default form-control"><b class="fa fa-print fa-bg">&nbsp;</b>Print</button>
            </div>
            </form> -->
        </div><!-- /.row -->
        <!-- /.container-fluid -->
     </div>

    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.number.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!-- DatePicker -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<script type="text/javascript">
        /*DatePicker*/

$(document).ready(function() {
    $("#print").click(function(event) {
        var val = $("#salesno").val();
        $("#printed").val(val);
    });
    function calc(){
        var a = parseFloat($("#totalamounts").val()) || 0;
        var b = parseFloat($("#vat").val())/100 || 0;
        $("#totalamountDUE").val(a);
        $("#net").val( Math.round((a*b)*100)/100 );
        var c = parseFloat($("#net").val());
        $("#tsales").val(Math.round((a-c)*100)/100);
       
    }
    $("#vat").click(function(event) {
       calc();
    });
    function viewData() {
        var sales_no = $("#salesno").val();
        $.post('showjax.php',{sales_no:sales_no}, function(data, textStatus, xhr) {
            $("tbody").html(data);
            calc();
        });
    }
    viewData();
    $("#addprod").click(function(event) {
       var product = $("#cprod").val();
       var quantity = $("#qty").val();
       var salesno = $("#salesno").val();
       var custid = $("#custid").val();
       $.post('addjax.php', {product: product, quantity: quantity, custid: custid, salesno: salesno},function (data,textStatus,xhr) {
           calc();
           viewData();
       });       
    });
    $(document).on('click', '#btn-delete', function(event) {
        var deleted = $(this).data('dids');
        var qty = $(this).data('qty');
        $.post('deljax.php', {deleted: deleted, qty: qty}, function(data, textStatus, xhr) {
            viewData();
        });
    });
    $("#save").click(function(event) {
       var sales_no = $("#salesno").val();
       var cust_id = $("#custid").val();
       var date = $("#dateToday").val();
       var prepare = $("#preby").val();
       var check = $("#checkby").val();
       var vat = $("#vat").val();
       var tad = $("#totalamountDUE").val();
       var net = $("#net").val();
       var tsales = $("#tsales").val();
       var terms = $("#terms1").val();
       $.post('save.php', {save: 'ok',terms: terms,sales_no: sales_no, cust_id: cust_id, date: date, prepare: prepare, check: check, vat: vat, tad: tad, net: net, tsales: tsales}, function(data, textStatus, xhr) {
           $(".result").html(data);
       });
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

});

    /**/
</script>
</body>
</html>