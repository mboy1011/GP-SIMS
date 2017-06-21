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
    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
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
          <ol class="breadcrumb">
          <li><a href="index.php">Overview</a></li>
          <li class="active">View User</li>
          </ol>
          <hr>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>    
                            <th>Date Added</th>   
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT * FROM tbl_useraccounts") or die(mysql_error());
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $row['uid']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['password']; ?></td>            
                            <td><?php echo $row['timestamp']; ?></td>    
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edits btn btn-warning btn-xs"  data-title="Edit" data-id="<?php echo $row['uid']; ?>"  data-us="<?php echo $row['lname']; ?>" data-pa="<?php echo $row['password']; ?>"  data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                                <b data-placement="top" title="Delete"><button class="btn-deletes btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['uid']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
                            </td> 
                          </tr>
                      <?php } ?>
                    </tbody>
                </table>            
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
<script type="text/javascript">
$(document).ready(function(){
    $('#datatables').dataTable();
});
</script>
</body>
</html>