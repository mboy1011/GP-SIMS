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
              <ol class="breadcrumb">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">Add Products</li>
              </ol>
              <hr>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            
          </div>
          <div class="col-sm-4">
          
            <form method="POST" action="" class="form-horizontal">
            <center><p><li class="fa fa-cart-plus fa-2x">&nbsp;</li><b style="font-size: 18px;">Product Details:</b></p></center>
            <hr>
                <input type="text" name="pname" placeholder="Product Name" class="form-control" required="">
                <div class="input-group">
                  <label for="comment"></label>
                  <textarea class="form-control" rows="8" cols="60" name="pdesc" id="comment" placeholder="Product Description"></textarea>
                </div>
                <div class="input-group date form_date">
                    <span class="input-group-addon" ><span class="glyphicon glyphicon-calendar"></span></span>
                    <input name="expdate" id="date" class="form-control" size="16" type="text" placeholder="Expiration Date">
                </div>
                <input type="text" name="lotno" placeholder="Lot No." class="form-control" required="">
                <input type="number" name="quantity" placeholder="Quantity / BOX" class="form-control" required="">
                <input type="text" name="pack" placeholder="Packing" class="form-control" required="">
                <div class="input-group">
                    <span class="input-group-addon">₱</span>
                    <input type="number" step="any" name="price" placeholder="Unit Price" class="form-control">
                </div>
                <input type="submit" name="Submit" class="btn btn-primary form-control">
            </form>
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
                $sql=$oop->insertPro($pn,$pd,$ex,$lo,$pr,$pk,$qt);
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

});

    /**/
</script>
</body>
</html>