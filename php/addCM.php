<?php
require 'session.php';
require 'crud.php';
$oop = new CRUD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
    <!-- Bootstrap CSS -->
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
              <li class="active">Add Credit/Debit Memo</li>
              </ol>
              <hr>
            </div>
        </div>       
        <div class="row">
          <div class="col-sm-4">
            
          </div>
          <div class="col-sm-4">
            <center><p><li class="fa fa-credit-card">&nbsp;</li><b style="font-size: 18px;">Credit Memo</b></p></center>
          </div>
          <div class="col-sm-4">
            
          </div>
        </div>
        <?php
        if (isset($_POST['save'])) {
            $cm = mysqli_real_escape_string($db,$_POST['cm_no']);
            $dt = mysqli_real_escape_string($db,$_POST['today']);
            $sm = mysqli_real_escape_string($db,$_POST['salesman']);
            $ct = mysqli_real_escape_string($db,$_POST['customer']);
            $si = mysqli_real_escape_string($db,$_POST['sales_no']);
            $tt = mysqli_real_escape_string($db,$_POST['totalAmount']);
            $rs = mysqli_real_escape_string($db,$_POST['reasons']);
            $sql = $oop->insertCM($cm,$ct,$si,$rs,$dt,$tt,$sm);
            if(!$sql){
               ?>
                  <div class="alert alert-warning alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Already Registered!</strong> Try Again.
                  </div>
              <?php
            }else{
                // $sql2 = $oop->siCredit($si,$tt);
                    ?>
                  <div class="alert alert-success alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Successfully Registered!</strong>
                  </div>
                    <?php
            }
        }
        ?>
        <form method="POST" action="" accept-charset="utf-8">
        <div class="row">
            <?php
            $q = mysqli_query($db,"SELECT MAX(cm_no) AS max_id FROM tbl_CM");
            $row = mysqli_fetch_assoc($q);
            $max_id = $row['max_id']+1;
            ?>
            <div class="col-sm-4">
                <div class="input-group" id="cmno">
                  <span class="input-group-addon">Credit/Debit Memo No:</span>
                  <input type="number" step="any" id="cm_no" class="form-control" min="<?php echo $max_id?>" name="cm_no" value="<?php echo sprintf('%04d',$max_id);?>">
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
                <div class="input-group" id="cmno">
                  <span class="input-group-addon">Salesman:</span>
                  <input type="text"  class="form-control" name="salesman">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                  <span class="input-group-addon">Customer:</span>
                  <select name="customer" class="form-control" id="cust">
                    <option>-- Select Customer Here --</option>
                          <?php
                            $result =mysqli_query($db, "SELECT cus_id,full_name FROM tbl_customers");
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              echo"<option value='$row[cus_id]'>";
                              echo $row['full_name'];
                              echo"</option>";
                            }
                          ?>
                 </select> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                   <span class="input-group-addon">Sales No:</span>
                   <select name="sales_no" class="form-control" id="sales_no">
                      
                   </select> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="input-group">
                           <span class="input-group-addon">Choose Product:</span>
                           <select name="payment" class="form-control" id="prods">
                              
                           </select> 
                        </div>
                      </div>    
                      <div class="col-sm-2">
                          <input type="hidden" id="qty" name="qty" class="form-control" placeholder="Quantity"  hidden="">
                          <input type="number" min="1" id="qty1" name="qty" class="form-control" placeholder="Quantity">
                      </div>
                      <div class="col-sm-4">
                          <button type="button" class="btn btn-info form-control" id="add"><b class="fa fa-plus">&nbsp;</b>Add</button>
                      </div>
                  </div>
                </div><!-- panel heading-->
              <div class="panel-body" style="height:200px; overflow-y: auto;">
                <div class="table-responsive">      
                  <table class="table table-hover table-fixed table-striped">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Particulars</th>
                        <th>QTY</th>
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
              </div><!-- panel body-->
              </div><!-- panel-->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                  <label for="comment">Reason(s) for Return:</label>
                  <textarea class="form-control" rows="3" id="comment" name="reasons"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group">
                  <span class="input-group-addon">Total Amount:</span>
                  <input type="number" step="any" id="totalAmount" class="form-control" name="totalAmount">
                </div>
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-success form-control" name="save"><b class="fa fa-save">&nbsp;</b>Save</button>
            </div>
        </div>
        </form>
<!-- Notify -->
<div id="notify-alert" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">NOTIFICATION</h4>
      </div>
      <div class="modal-body">
         
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
<!-- DatePicker -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<script type="text/javascript">
    ;(function(){
    function calc(){
        var total = $("#totalAM").val()||0;
        $("#totalAmount").val(total);
    }
    $("#cust").change(function(event) {
      var c = $("#cust").val()
      if (c!='-- Select Customer Here --') {
        $.post('addjax.php', {cust: c}, function(data, textStatus, xhr) {
          $("#sales_no option").remove();
          $("#prods option").remove();
          $("#sales_no").append("<option value='--Select Sales Invoice--'>--Select Sales Invoice--</option>");
          $("#sales_no").append(data);
          $("#qty").val('');
          $("#qty1").val('');
        });
      }else{
        $("#prods option").remove();
        $("#sales_no option").remove();
        $("#qty").val('');
        $("#qty1").val('');
      }
    });
    $("#sales_no").change(function(event) {
       var s = $("#sales_no").val();
       if (s!='--Select Sales Invoice--') {
            $.post('addjax.php', {products: s}, function(data, textStatus, xhr) {
                $("#prods option").remove();
                $("#prods").append("<option value='--Select Products--'>--Select Products--</option>");
                $("#prods").append(data);
                $("#qty").val('');
                $("#qty1").val('');
            });
       }else{
            $("#prods option").remove();
            $("#qty").val('');
            $("#qty1").val('');
       }
    });
    $("#prods").change(function(event) {
       var p = $("#prods").val();
       var s = $("#sales_no").val();
       if (p!='--Select Products--') {
            $.post('addjax.php', {quantity: p,sales: s}, function(data, textStatus, xhr) {
                $("#qty").val(data);
                $("#qty1").val(data);
            });
       }else{
            $("#qty").val('');
            $("#qty1").val('');
       }
    });
    $("#add").click(function(event) {
       var q = parseInt($("#qty").val());
       var q1 = $("#qty1").val();
       var p = $("#prods").val();
       var s = $("#sales_no").val();
       var si = $("#si_no1").val();
       var c = $("#cm_no").val();
        if(s==null||s==undefined||p==null||p==undefined||p=='--Select Products--'||p=='--Select Products--'||q==null||q==undefined) {
            $("#notify-alert").modal();
       }else{
            if (q1>q||q1==0||q1<0) {
                $("#notify-alert").modal();   
            }else{
                if (si==undefined||si==null) {
                  $("#notify-alert").modal();  
                }else{
                    if (s!=si) {
                        $("#notify-alert").modal();   
                    }else{
                        $.post('addjax.php', {addCM:'addCM',prod_id: p,qty: q1,si_no:s,cm_no:c}, function(data, textStatus, xhr) {
                            viewData();
                        });
                    }
                }
            }
       }
    });
    $(document).on('click', '#btn-remove', function(event) {
        var id = $(this).data('id');
        var qt = $(this).data('qt');
        var pi = $(this).data('pi');
        var pr = $(this).data('pr');
        var am = $(this).data('am');
        var si = $("#sales_no").val();
        $.post('deljax.php', {removeCM: 'removeCM',id:id,qt:qt,pi:pi,si:si,pr:pr,am:am}, function(data, textStatus, xhr) {
            viewData();   
        });
    });
    function viewData(){
        var cm = $("#cm_no").val();
        var pi = $("#prods").val();
        var si = $("#sales_no").val();
        $.post('showjax.php', {cm_no:cm,pid:pi,si:si}, function(data, textStatus, xhr) {
            $("tbody").html(data);
            calc();
        });
    }
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
    $('.form_date').datepicker({
      format: "yyyy/mm/dd",
      language: 'en-AU',
      todayHighlight: true,
      autoclose: true
    }).datepicker('setDate', new Date());        
    })();
</script>
</body>
</html>