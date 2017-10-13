<?php
require 'session.php';
require 'crud.php';
$oop = new CRUD();
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
        <div class="row">
            <div class="col-sm-12">
                <?php  
    if (isset($_POST['save'])) {
            $sales_no = mysqli_real_escape_string($db,$_POST['sales_no']);
            $cust_id = mysqli_real_escape_string($db,$_POST['cust_id']);
            $prod = mysqli_real_escape_string($db,$_POST['product']);
            $qty = mysqli_real_escape_string($db,$_POST['quantity']);
            $tad = mysqli_real_escape_string($db,$_POST['tad']);
            $dis1 = mysqli_real_escape_string($db,$_POST['dis1']);
            $dis2 = mysqli_real_escape_string($db,$_POST['dis2']);
            $today = mysqli_real_escape_string($db,$_POST['today']);
            $prepare = mysqli_real_escape_string($db,$_POST['prepareby']);
            $check = mysqli_real_escape_string($db,$_POST['checkby']);
            $vat = mysqli_real_escape_string($db,$_POST['vat']);
            $net = mysqli_real_escape_string($db,$_POST['net']);
            $tsales = mysqli_real_escape_string($db,$_POST['tsales']);
            $term = mysqli_real_escape_string($db,$_POST['terms']);
            $td = mysqli_real_escape_string($db,$_POST['total_discount']);
            $date = date_create($today);
            date_add($date,date_interval_create_from_date_string($term));
            $due = date_format($date,"Y-m-d");
            $insert = $oop->insertSI($sales_no,$cust_id,$prod,$qty,$tad,$dis1,$dis2,$today,$prepare,$check,$vat,$net,$tsales,$term,$date,$due,$td);
            if(!$insert) {
                ?>
                     <div class="alert alert-warning alert-dismissable">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Already Saved!</strong>Try Again.
                     </div>
                <?php
            }else{
                ?>
                     <div class="alert alert-success alert-dismissable">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Successfully Saved!</strong>
                     </div>
                <?php
            }
    }
                ?>
            </div>
        </div>
        <hr>
        <form method="POST" action="">
        <div class="row">
            <div class="col-sm-5">
            <!-- <form method="POST" action="">  -->
                <div class="input-group">
                <span class="input-group-addon">Choose Customer:</span>
                 <select name="cust_id" class="form-control" id="sel_cust">
                    <option value="0">-- Select Customer Here --</option>
                          <?php
                            $result =mysqli_query($db, "SELECT cus_id,full_name FROM tbl_customers");
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              echo"<option value='$row[cus_id]'>";
                              echo $row['full_name'];
                              echo"</option>";
                            }
                          ?>
                 </select> 
                     <!-- <span class="input-group-btn">
                       <button class="btn btn-primary" type="submit" name="go">Submit!</button>
                     </span> -->
                 </div>
            <!-- </form>  -->
            </div>
            <div class="col-sm-2">
                        
            </div>
            <div class="col-sm-5"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">SOLD to</span>
                    <input type="hidden" id="custid" value="" name="cust_id">
                    <input type="text"  name="sold" class="form-control" value="" id="si_sold" required="">
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
                    <input type="text" name="tin" value="" class="form-control" id="si_tin">
                </div>             
            </div>
            <div class="col-sm-4">
                <div class="input-group">
            <?php
            $max = mysqli_query($db,"SELECT MAX(sales_no) as max_id FROM tbl_sales");     
            $rowss = mysqli_fetch_assoc($max); 
            $max_id=$rowss['max_id']+1;      
            ?>
                    <span class="input-group-addon">Sales Invoice No.</span>
                    <input type="number" step="any"  name="sales_no" min="<?php echo $max_id; ?>" value="<?php echo sprintf("%04d",$max_id);?>" id="salesno" class="form-control" required="" readonly>
                     <span class="input-group-addon"><b id="editSI" class="label label-success"><i id="chSI" class="fa fa-check"></i></b></span> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Address</span>
                    <input type="text" step="any" name="address" value="" id="si_add" class="form-control" required="">
                </div>
            </div>                
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Terms</span>
                    <input type="text" id="terms1" step="any" value="" name="terms" class="form-control" required="">
                </div>
            </div>                
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon">Business Style</span>
                    <input type="text" step="any" value="" name="bstyle" id="si_bstyle" class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">OSCA/PWD ID No.</span>
                    <input type="text" step="any" name="oidno" value="" id="si_osca" class="form-control">
                </div>
            </div>                
        </div>
        <div class="row">
            <div class="col-sm-8">
                
            </div>
            <div class="col-sm-4">
                 <div class="input-group">
                    <span class="input-group-addon">Discount 1:</span>
                    <input type="number" id="discount1" step="any" name="dis1" min="0" max="100" value="" class="element form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Discount 2:</span>
                    <input type="number" id="discount2" step="any" name="dis2" min="0" max="100" value="" class="element form-control">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">      
            <div class="col-sm-12">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                        <span class="input-group-addon">Choose Products:</span>
                         <select name="" class="form-control" id="cprod">
				            <option value="0">--Select Products Here--</option>
                                  <?php
                                    $result =mysqli_query($db, "SELECT * FROM tbl_products WHERE status!='OUT OF STOCKS' ORDER BY name");
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                      echo"<option value='$row[prod_id]'>";
                                      echo $row['name']."    ".$row['packing']."    (".$row['lot_no'].")";
                                      echo"</option>";
                                    }
                                  ?>
                         </select>
                         </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" readonly="" class="form-control" placeholder="Boxes" id="boxes">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="qty" min="0" name="qty" placeholder="Quantity">
                    </div>
                    <div class="col-sm-2">
                         <button class="btn btn-default form-control" type="button" name="addprod" id="addprod"><b class="fa fa-plus fa-bg">&nbsp;</b>Add</button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /panel-heading -->
            <div class="panel-body" style="height: 200px;overflow-y: auto;">
                <div class="table-responsive">             
                    <table class="table table-hover table-fixed table-striped" id="add_product_list">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Product Description</th>
                                <th>Lot No.</th>
                                <th>Expiry</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Edit</th>
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
        <?php
        // }
        ?>
        <div class="row">
            <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-addon">Gross Sales:</span>
                    <input type="text"  readonly="" id="totalamountDUE"  name="tad" class="element form-control">
                </div>
            </div>
            <div class="col-sm-3">      
                <div class="input-group">
                    <span class="input-group-addon">VAT</span>
                    <input type="text" readonly="" id="net" step="any" name="net" class="element form-control">
                </div>
               
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-addon">Net Sales</span>
                    <input type="text" id="tsales" readonly="" name="tsales" class="element form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <span class="input-group-addon">Less: VAT %</span>
                    <input type="number" id="vat" step="any" name="vat" value="12" min="0" max="100" class="form-control" readonly>
                    <span class="input-group-addon"><b id="editVAT" class="label label-success"><i id="chVat" class="fa fa-check"></i></b></span> 
                </div>
            </div>
        </div><!-- /.row -->
        <hr>
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
                <input type="number" step="any" name="total_discount" id="total_discount" hidden="">
            </div>
            <div class="col-sm-3">
                <button type="submit" name="save" class="btn btn-success form-control"><b class="fa fa-save fa-bg">&nbsp;</b>Save</button>
            </div>
            </form>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Price</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="idPrice" class="element form-control">
        <div class="input-group">
            <span class="input-group-addon">Price:</span>
            <input type="number" step="any" name="id" id="editPrice" class="element form-control">
        </div>
        <input type="hidden" step="any" name="" id="editQty">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="updatePrice" data-dismiss="modal"><b class="fa fa-pencil">&nbsp;</b>Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>            
<div id="warning" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notification</h4>
      </div>
      <div class="modal-body">
        <strong id="text"></strong>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>   
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
    $("#sel_cust").change(function(event) {
        var val = $("#sel_cust").val();
        if (val==0) {
            $("#custid").val('');
            $("#si_sold").val('');
            $("#si_bstyle").val('');
            $("#si_add").val('');
            $("#si_tin").val('');
            $("#si_osca").val('');
            $("#terms1").val('');
        }else{
            $.post('data.php', {cust_data: 'cust_data',si_cust_id: val}, function(data, textStatus, xhr) {
                var obj = JSON.parse(data);
                var cus_id = [];
                var full_name = [];
                var tin = [];
                var terms = [];
                var bstyle = [];
                var address = [];
                var discount1 = [];
                var discount2 = [];
                var osca = [];
                for (var i = 0; i < obj.length; i++) {
                    cus_id.push(obj[i].cus_id);
                    full_name.push(obj[i].full_name);
                    tin.push(obj[i].tin);
                    terms.push(obj[i].terms);
                    bstyle.push(obj[i].bstyle);
                    address.push(obj[i].address);
                    discount1.push(obj[i].discount1);
                    discount2.push(obj[i].discount2);
                    osca.push(obj[i].opidno);
                }
                $("#custid").val(cus_id);
                $("#si_sold").val(full_name);
                $("#si_bstyle").val(bstyle);
                $("#si_add").val(address);
                $("#si_tin").val(tin);
                $("#si_osca").val(osca);
                $("#terms1").val(terms);
                parseFloat($("#discount1").val(discount1));
                parseFloat($("#discount2").val(discount2));
            });
        }
    });
    $("#editVAT").click(function(event) {
        if($("#vat").attr('readonly')){
            $("#vat").removeAttr('readonly');
            $("#editVAT").attr('class', 'label label-warning');
            $("#chVat").attr('class', 'fa fa-pencil');
        }else{
            $("#vat").attr('readonly', true);
            $("#editVAT").attr('class', 'label label-success');
            $("#chVat").attr('class','fa fa-check');
        }
    });
    $("#editSI").click(function(event) {
       if ($("#salesno").attr('readonly')) {
            $("#salesno").removeAttr('readonly');
            $("#editSI").attr('class', 'label label-warning');
            $("#chSI").attr('class', 'fa fa-pencil');
       }else{
            $("#salesno").attr('readonly',true);
            $("#editSIit").attr('class', 'label label-success');
            $("#chSI").attr('class', 'fa fa-check');
       }
    });
    var item=0;
    function calc(){
        var a = parseFloat($("#totalamounts").val()) || 0;
        var b = parseFloat($("#vat").val())/100 || 0;
        var dis1 = parseFloat($("#discount1").val())/100 || 0;
        var dis2 = parseFloat($("#discount2").val())/100 || 0;
        var total1 = a-(a*dis1);
        var total2 = total1-(total1*dis2);
        var totaldis1 = a*dis1;
        var totaldis2 = total1*dis2;
        var totaldis = parseFloat(totaldis1) + parseFloat(totaldis2);
        $("#total_discount").val(totaldis);
        var d = total2;
        $("#totalamountDUE").val(d);
        $("#net").val( Math.round((a/1.12*b)*100)/100 );
        var c = parseFloat($("#net").val());
        $("#tsales").val(Math.round((a-c)*100)/100);
    }
    $("#vat").bind('keyup click',function(event) {
       calc();
    });
    $("#discount1, #discount2").bind('keyup click',function(event) {
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
       var prod_len = $("#add_product_list").children('tbody').children('tr').length;
       if(prod_len <= 19){       
           var product = $("#cprod").val();
           var quantity = $("#qty").val();
           var salesno = $("#salesno").val();
           var custid = $("#custid").val();
           var qty = $("#qty").val();
           var boxes = parseInt($("#boxes").val());
           if (qty>boxes||qty<0) {
                $("#warning").modal();
                $("#text").text("There's not enough quantity.");
           }else if(qty==0||qty==null){
                $("#warning").modal();
                $("#text").text("Quantity is invalid.");
           }else{
                if(item>4) {
                    $("#warning").modal();
                    $("#text").text("Number of Item exceeds on Sales Invoice.");
                }else{
                    $.post('addjax.php', {product: product, quantity: quantity, custid: custid, salesno: salesno},function (data,textStatus,xhr) {
                       calc();
                       viewData();
                    });  
                }   
           }
       }else{
            $("#warning").modal();
            $("#text").text("Item's exceeds on Sales Invoice.");
       }
    });
    $(document).on('click', '#btn-delete', function(event) {
        var deleted = $(this).data('dids');
        var qty = $(this).data('qty');
        $.post('deljax.php', {deleted: deleted, qty: qty}, function(data, textStatus, xhr) {
            viewData();
        });
    });
    $(document).on('click', '#btn-update', function(event) {
        var id = $(this).data('up');
        var pr = $(this).data('eprices');
        var qt = $(this).data('qty');
        $("#idPrice").val(id);
        $("#editPrice").val(pr);
        $("#editQty").val(qt);
        $("#myModal").modal();
    });
    $("#updatePrice").click(function(event) {
        var id = $("#idPrice").val();
        var updated = $("#editPrice").val();
        var qty = $("#editQty").val();
        $.post('deljax.php', {updated: updated, id: id, qty: qty}, function(data, textStatus, xhr) {
            calc();
            viewData();
        });
    });
    $("#cprod").change(function(event) {
       if ($("#cprod").val()!=0) {
        var prodin = $("#cprod").val();
        $.post('addjax.php', {prodin: prodin}, function(data, textStatus, xhr) {
            $("#boxes").val(data);
        });
       }else{
            $("#boxes").val('');
       }
    });
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $('.form_date').datepicker({
    format: "yyyy/mm/dd",
    language: 'en-AU',
    todayHighlight: true,
    setDate: today,
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
});

    /**/
</script>
</body>
</html>

