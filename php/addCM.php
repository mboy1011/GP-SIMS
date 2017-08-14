<?php
include 'session.php';
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
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <style type="text/css" media="screen">
     #notify{
         background-color: #ff3333;
         color: #fff;
     }
 </style>
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
                            echo "<li><a href='viewProduct.php'>".$row['name'].' '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct.php'>".$rows['name'].' '.$rows['packing']."</a></li>";
                        }
                   ?>
                   </li>
                   <li class='divider'></li>
               </ul>
            </li>        
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
                    <a href="#" data-toggle="collapse" data-target="#submenu-6"><i class="fa fa-fw fa-inbox"></i> Collections Receipt <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-6" class="collapse">
                        <li><a href="addCR.php"><i class="fa fa-plus">&nbsp;</i>Add CR</a></li>
                        <li><a href="viewCR.php"><i class="fa fa-list">&nbsp;</i>CR List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-7"><i class="fa fa-fw  fa-credit-card"></i> Credit/Debit Memo <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-7" class="collapse">
                        <li><a href="addCM.php"><i class="fa fa-plus">&nbsp;</i>Add C/D Memo</a></li>
                        <li><a href="viewCM.php"><i class="fa fa-list">&nbsp;</i>C/D Memo List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-8"><i class="fa fa-fw  fa-shopping-cart"></i> Purchase Orders<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-8" class="collapse">
                        <li><a href="addPO.php"><i class="fa fa-plus">&nbsp;</i>Add PO</a></li>
                        <li><a href="viewPO.php"><i class="fa fa-list">&nbsp;</i>PO List</a></li>
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
                        <li><a href="addInvoice.php"><i class="fa fa-plus">&nbsp;</i>Add Invoice</a></li>
                        <li><a href="viewInvoice.php"><i class="fa fa-list">&nbsp;</i>Sales Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="addProduct.php"><i class="fa fa-plus">&nbsp;</i>Inventory In</a></li>
                        <li><a href="viewProduct.php"><i class="fa fa-list">&nbsp;</i>List Products</a></li>
                        <li><a href="viewInvOut.php"><i class="fa fa-minus">&nbsp;</i>Inventory Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers Profile <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="addCustomer.php"><i class="fa fa-user-plus">&nbsp;</i>Add Customers</a></li>
                        <li><a href="viewCustomers.php"><i class="fa fa-users">&nbsp;</i>Customers List</a></li>
                        <li><a href="viewCustPro.php"><i class="fa fa-user-circle">&nbsp;</i>View Profile</a></li>
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
                    <a href="#" data-toggle="collapse" data-target="#submenu-10"><i class="fa fa-fw fa-truck"></i> Suppliers <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-10" class="collapse">
                        <li><a href="addSup.php"><i class="fa fa-user-plus">&nbsp;</i>Add Suppliers</a></li>
                        <li><a href="viewSup.php"><i class="fa fa-users">&nbsp;</i>View Suppliers</a></li>
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
              <ol class="breadcrumb">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">Add Credit/Debit Memo</li>
              </ol>
              <hr>
            </div>
        </div>
            <?php
            include 'crud.php';
            $oop = new CRUD();
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $fn = mysqli_real_escape_string($db,$_POST['fname']);
                $ln = mysqli_real_escape_string($db,$_POST['lname']);
                $mn = mysqli_real_escape_string($db,$_POST['mname']);
                $po = mysqli_real_escape_string($db,$_POST['position']);
                $sql=$oop->insertEmp($fn,$ln,$mn,$po);
                if(!$sql){
                   ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Already Registered!</strong> Try Again.
                      </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Successfully Registered!</strong>
                      </div>
                  <?php
                }
            }
            ?>        
        <div class="row">
          <div class="col-sm-4">
            
          </div>
          <div class="col-sm-4">
            <center><p><li class="fa fa-credit-card">&nbsp;</li><b style="font-size: 18px;">Credit Memo</b></p></center>
          </div>
          <div class="col-sm-4">
            
          </div>
        </div>
        <div class="row">
            <?php
            $q = mysqli_query($db,"SELECT MAX(cm_no) AS max_id FROM tbl_CM");
            $row = mysqli_fetch_assoc($q);
            $max_id = $row['max_id']+1;
            ?>
            <div class="col-sm-4">
                <div class="input-group" id="cmno">
                  <span class="input-group-addon">Credit/Debit Memo No:</span>
                  <input type="number" step="any" class="form-control" min="<?php echo $max_id?>" name="cm_no" value="<?php echo sprintf('%04d',$max_id);?>">
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
                   <select name="payment" class="form-control" id="sales_no">
                      
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
                          <input type="number" id="qty" name="qty" class="form-control" placeholder="Quantity">
                      </div>
                      <div class="col-sm-4">
                          <button type="button" class="btn btn-info form-control"><b class="fa fa-plus">&nbsp;</b>Add</button>
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
                <div class="input-group" id="cmno">
                  <span class="input-group-addon">Total Amount:</span>
                  <input type="number" step="any" class="form-control" name="totalAmount">
                </div>
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-success form-control"><b class="fa fa-save">&nbsp;</b>Save</button>
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
    $("#cust").change(function(event) {
      var c = $("#cust").val()
      if (c!='-- Select Customer Here --') {
        $.post('addjax.php', {cust: c}, function(data, textStatus, xhr) {
          $("#sales_no option").remove();
          $("#sales_no").append("<option value='--Select Sales Invoice--'>--Select Sales Invoice--</option>");
          $("#sales_no").append(data);
        });
      }
    });
    $("#sales_no").change(function(event) {
       var s = $("#sales_no").val();
       if (s!='--Select Sales Invoice--') {
            $.post('addjax.php', {products: s}, function(data, textStatus, xhr) {
                $("#prods option").remove();
                $("#prods").append("<option value='--Select Products--'>--Select Products--</option>");
                $("#prods").append(data);
            });
       }
    });
    $("#prods").change(function(event) {
       var p = $("#prods").val();
       var s = $("#sales_no").val();
       if (p!='--Select Products--') {
            $.post('addjax.php', {quantity: p,sales: s}, function(data, textStatus, xhr) {
                $("#qty").val(data);
            });
       }
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