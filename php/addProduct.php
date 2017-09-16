<?php
include 'session.php';
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
              <li class="active">Inventory In</li>
              </ol>
              <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <?php
            include 'crud.php';
            $oop = new CRUD();
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $pn = mysqli_real_escape_string($db,$_POST['pname']);
                $qt = mysqli_real_escape_string($db,$_POST['quantity']);
                $pd = mysqli_real_escape_string($db,$_POST['pdesc']);
                $ex = mysqli_real_escape_string($db,$_POST['expdate']);
                $lo = mysqli_real_escape_string($db,$_POST['lotno']);
                $pr = mysqli_real_escape_string($db,$_POST['price']);
                $pk = mysqli_real_escape_string($db,$_POST['pack']);
                $pk1 = mysqli_real_escape_string($db,$_POST['pack1']);
                $pack = $pk.$pk1;
                $sql=$oop->insertPro($pn,$pd,$ex,$lo,$pr,$pack,$qt);
                if(!$sql){
                   ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Already Added!</strong> Try Again.
                      </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Successfully Added!</strong>
                      </div>
                  <?php
                }
            }
            ?>                 
                <center><p><li class="fa fa-cart-plus fa-2x">&nbsp;</li><b style="font-size: 18px;">New Products</b></p></center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-3">
                <button class="btn btn-primary form-control" id="newB"><b class="fa fa-plus">&nbsp;</b>New batch</button>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-primary form-control" id="newP"><b class="fa fa-plus">&nbsp;</b>New Product</button>
            </div>
            <div class="col-sm-2">
                
            </div>
        </div>
        <div class="row">
         <div class="col-sm-4">
             
         </div>
         <div class="col-sm-4">
            <div class="input-group" id="batch" style="display: none;">
              <span class="input-group-addon">Product:</span>
              <select name="customer" class="form-control" id="prod_batch">
                <option>-- Select Product Here --</option>
                      <?php
                        $result =mysqli_query($db, "SELECT prod_id,name,packing FROM tbl_products");
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                          echo"<option value='$row[prod_id]'>";
                          echo $row['name'].' '.$row['packing'];
                          echo"</option>";
                        }
                      ?>
             </select> 
            </div>
          </div>
        </div>
        <br>
        <div class="row"> 
          <div class="col-sm-4">
              
          </div>   
          <div class="col-sm-4" id="new" style="display: none;">         
            <form method="POST" action="" class="form-horizontal">
                <input type="text" name="pname" placeholder="Product Name" class="form-control" required="" id="product_name">
                <div class="input-group">
                  <label for="comment"></label>
                  <textarea class="form-control" rows="8" cols="60" name="pdesc" placeholder="Product Description" id="product_desc"></textarea>
                </div>
                <div class="input-group date form_date">
                    <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                    <input name="expdate" id="date" class="form-control" size="16" type="text" placeholder="Expiration Date">
                </div>
                <input type="text" name="lotno" placeholder="Lot No." class="form-control" required="">
                <input type="number" name="quantity" placeholder="Quantity / BOX" class="form-control" required="">
                <div class="form-inline">
                    <div class="input-group">
                        <input type="number" name="pack" placeholder="Packing" class="form-control" required="" id="product_pack">
                    </div>
                    <div class="input-group">
                        <select id="memoryType" name="pack1" class="form-control">
                            <option value="mg" selected="selected">mg</option>
                            <option value="g">g</option>
                            <option value="mL">mL</option>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">₱</span>
                    <input type="number" step="any" name="price" placeholder="Unit Price" class="form-control">
                </div>
                <input type="submit" name="Submit" class="btn btn-primary form-control">
            </form>
          </div>
          <div class="col-sm-4">
            
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
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<script type="text/javascript">
        /*DatePicker*/
$(document).ready(function() {
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $('.form_date').datepicker({
    format: "yyyy/mm/dd",
    language: 'en-AU',
    todayHighlight: true,
    setDate: today,
    autoclose: true
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
    $("#newB").click(function(event) {
        $("#new").hide();
        $("#batch").slideToggle('300', function() {
            
        });
    });
    $("#newP").click(function(event) {
       $("#batch").hide();
       $("#new").slideToggle('300', function() {

       });
    });
    $("#prod_batch").change(function(event) {
        var prod =  $("#prod_batch").val();
       $.post('data.php', {prod_det: prod}, function(data, textStatus, xhr) {
            if(prod!='-- Select Product Here --'){
                $("#new").show();
                var obj = JSON.parse(data);
                var name = [];
                var desc = [];
                var pack = [];
                for (var i = 0; i < obj.length; i++) {
                    name.push(obj[i].name);
                    desc.push(obj[i].description);
                    pack.push(obj[i].packing);
                }
                $("#product_name").val(name);
                $("#product_desc").text(desc);
                $("#product_pack").val(pack);
            }
       });
    });
});

    /**/
</script>
</body>
</html>