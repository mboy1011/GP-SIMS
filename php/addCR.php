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
              <li class="active">Add Collections Receipt</li>
              </ol>
              <hr>
            </div>
        </div>
<?php
      if (isset($_POST['save'])){
        $cr = mysqli_real_escape_string($db,$_POST['cr']);
        $date = mysqli_real_escape_string($db,$_POST['today']);
        $p_type = mysqli_real_escape_string($db,$_POST['payment']);
        $chk_no = mysqli_real_escape_string($db,$_POST['check']);
        $ts = mysqli_real_escape_string($db,$_POST['totalsales']);
        $cs = mysqli_real_escape_string($db,$_POST['customer']);
        $sql = $oop->insertCR($cr,$date,$cs,$ts,$p_type,$chk_no);
        if (!$sql) {
          ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Already Added!</strong>
              </div>
          <?php
        }else{
          ?>
              <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Added!</strong>
              </div>
          <?php
        }
      }
?>        
        <div class="row">
        <form method="POST" action="">
          <div class="col-sm-6">
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
          <div class="col-sm-3">
            <div class="input-group">
              <span class="input-group-addon">C.R #</span>
              <?php 
                $max = mysqli_query($db,"SELECT MAX(cr_no) as max_id FROM tbl_CR");
                $rows = mysqli_fetch_assoc($max);
                $max_id = $rows['max_id']+1;
              ?>
              <input type="number" step="any" id="cr" name="cr" min="<?php echo sprintf('%04d',$max_id);?>" class="form-control" value="<?php echo sprintf('%04d',$max_id);?>">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="input-group date form_date">
                <span class="input-group-addon" >Date:</span>
                <input name="today" id="dateToday" class="form-control" size="16" type="text" placeholder="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="input-group">
              <span class="input-group-addon">Payment Type:</span>
              <select name="payment" class="form-control" id="pay">
                <option value="Cash">Cash</option>
                <option value="Check">Check</option>
             </select> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="input-group" id="checkno">
              <span class="input-group-addon">Check NO:</span>
              <input type="number" step="any" class="form-control" name="check">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="input-group">
                        <span class="input-group-addon">Sales Invoice No:</span>
                        <select name="si_no" class="form-control" id="sales_no">
                          
                       </select> 
                      </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="hidden" step="any" class="form-control" name="tad" id="tad" placeholder="Total Amount Due" >
                        <input type="number" step="any" class="form-control" id="amt" min="0" name="amt" placeholder="Amount" required="">
                    </div>
                    <div class="col-sm-4">
                         <button class="btn btn-default form-control" type="button" id="add" name="addprod" id="addprod"><b class="fa fa-plus fa-bg">&nbsp;</b>Add</button>
                    </div>
                  </div>
                </div><!-- panel heading-->
              <div class="panel-body" style="height:200px; overflow-y: auto;">
                <div class="table-responsive">      
                  <table class="table table-hover table-fixed table-striped">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Sales No.</th>
                        <th>Amount</th>
                        <th>Balance</th>
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
          <div class="col-sm-4">
            <div class="input-group" id="checkno">
              <span class="input-group-addon">Total Sales:</span>
              <input type="number" step="any" class="form-control" name="totalsales" id="total_s">
            </div>
          </div>
          <div class="col-sm-5">
            
          </div>
          <div class="col-sm-3">
            <button class="btn btn-success form-control" type="submit" name="save"><b class="fa fa-save">&nbsp;</b>Save</button>
          </div>
        </div>
        </form>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">NOTIFICATION</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="idPrice" class="element form-control">
        <div class="input-group">
            <p id="texthere" style="font-size: 15px;color:red;"></p>
        </div>
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
    $("#checkno").hide();
      function calc(){
        var total = parseFloat($("#total_amounts").val())||0;
        $("#total_s").val(total);
      }
      calc();
    $("#cust").change(function(event) {
      var c = $("#cust").val()
      if (c!='-- Select Customer Here --') {
        $.post('addjax.php', {cust: c}, function(data, textStatus, xhr) {
          $("#sales_no option").remove();
          $("#sales_no").append("<option value='0'>--Select Sales Invoice--</option>");
          $("#sales_no").append(data);
        });
      }else{
        $("#sales_no option").remove();
        $("#amt").val('');
        $("#tad").val('');
      }
    });
    $("#sales_no").change(function(event) {
      var c = $("#sales_no").val();
      if (c!='--Select Sales Invoice--') {
        var tad = parseInt($("#sales_no").val());
        $.post('addjax.php', {tad: tad}, function(data, textStatus, xhr) {
          $("#amt").val(data);
          $("#tad").val(data);
        });
      }else{
          $("#amt").val('');
          $("#tad").val('');
      }
    });
    $("#pay").change(function(event) {
      var c = $("#pay").val();
      if (c!='Cash'){
        $("#checkno").show('slow/400/fast', function() {
          
        });
      }else{
        $("#checkno").hide('slow/400/fast', function() {
          
        });
      }
    });
    $("#add").click(function(event) {
      var min = parseInt($("#cr").attr('min'));
      var total = parseInt($("#cr").val());
      var tad = parseFloat($("#tad").val());
      var am = parseFloat($("#amt").val());
      var si = parseInt($("#sales_no").val());
      if (total<min) {
        $("#texthere").text("Invalid C.R No. or Already Registered, Try Again!");
        $("#myModal").modal();
      }else{
        if (am>tad) {
          $("#texthere").text("The Amount Value is more than the Total Amount Due, Try Again!");
          $("#myModal").modal();
        }else if(am==0||am<0||am==null){
          $("#texthere").text("Please input a right amount, Try Again!");
          $("#myModal").modal();
        }else if(si==null||si==0){
          $("#texthere").text("Select Sales Invoice No., Try Again!");
          $("#myModal").modal();
        }else{
          $.post('addjax', {cr_si: si,cr_no: total, amount: am}, function(data, textStatus, xhr) {
            viewData();
          });
        }
      }
    });
    $(document).on('click', '#btn-delete', function(event) {
        var deleted = $(this).data('dids');
        var si = $(this).data('sids');
        $.post('deljax.php', {cr_del: deleted,si:si}, function(data, textStatus, xhr) {
            viewData();
        });
    });
    $("#not").click(function(event) {
        $("#notify").hide();
    });
    function viewData() {
        var cr_si = $("#sales_no").val();
        var cr_no = parseInt($("#cr").val());
        $.post('showjax.php',{cr_si:cr_si,cr_no:cr_no}, function(data, textStatus, xhr) {
            $("tbody").html(data);
            calc();
        });
    }
    viewData();
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