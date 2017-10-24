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
        <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fixedColumns.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><input type="hidden" id="user" value="<?php echo $name;?>"><?php echo $name;?><b class="fa fa-angle-down"></b></a>
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
              <li class="active">View Sales Report</li>
              </ol>
          <hr>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="input-group date min">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date From:</span>
                <input name="date" id="min" class="form-control" size="16" type="text" placeholder="">
                <input type="hidden" id="dateFrom">
              </div> 
            </div>
            <div class="col-sm-3">
              <div class="input-group date max">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date To:</span>
                <input name="date" id="max" class="form-control" size="16" type="text" placeholder="">
                <input type="hidden" id="dateTo">
              </div>
            </div>
            <div class="col-sm-3">
              
            </div>
            <div class="col-sm-3"><a href="addInvoice"><button class="btn btn-info form-control"> <i class="fa fa-plus">&nbsp;</i>Add Invoice</button></a></div>
        </div>
        <div class="row">
<?php
      if (isset($_POST['cancel'])){
        $si_no = mysqli_real_escape_string($db,$_POST['si_no']);
        $sql = $oop->upProd($si_no);
        if (!$sql) {
          ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Cancel!</strong> Try Again.
              </div>
          <?php
        }else{
          ?>
              <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Cancelled!</strong>
              </div>
          <?php
        }
      }else if(isset($_POST['delete'])){
        $si_no = mysqli_real_escape_string($db,$_POST['del_si']);
        $sql = $oop->upProd($si_no);
        if (!$sql) {
            $sql2 = $oop->delSI($si_no);
            if (!$sql2) {
                ?>
                  <div class="alert alert-warning alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Sales Invoice!</strong> Try Again.
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
        }else{
            $sql3 = $oop->delSI($si_no);
            if (!$sql3) {
                ?>
                  <div class="alert alert-warning alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Sales Invoice!</strong> Try Again.
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
      }elseif (isset($_POST['update'])) {
        $si = mysqli_real_escape_string($db,$_POST['edit_si']);
        $cus = mysqli_real_escape_string($db,$_POST['edit_cus']);
        $date = mysqli_real_escape_string($db,$_POST['edit_date']);
        $less = mysqli_real_escape_string($db,$_POST['edit_less']);
        $gross = mysqli_real_escape_string($db,$_POST['edit_gross']);
        $net = mysqli_real_escape_string($db,$_POST['edit_net']);
        $vat = mysqli_real_escape_string($db,$_POST['edit_vat']);
        $dis1 = mysqli_real_escape_string($db,$_POST['edit_dis1']);
        $dis2 = mysqli_real_escape_string($db,$_POST['edit_dis2']);
        $tdis = mysqli_real_escape_string($db,$_POST['edit_tdis']);
        $due = mysqli_real_escape_string($db,$_POST['edit_due']);
        $dr = mysqli_real_escape_string($db,$_POST['edit_dr']);
        $up = $oop->upSI($si,$cus,$date,$less,$gross,$net,$vat,$dis1,$dis2,$tdis,$due,$dr);
        if (!$up) {
          ?>
            <div class="alert alert-warning alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Update Sales Invoice!</strong> Try Again.
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
?>
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Sales No.</th>
                            <th>DR No.</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Less: VAT (%)</th>
                            <th>Gross (₱)</th>
                            <th>Net Sales (₱)</th>
                            <th>VAT (₱)</th>
                            <th>Discount 1 (%)</th>
                            <th>Discount 2 (%)</th>
                            <th>Total Discount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Print Action(s)</th> 
                            <th>Edit</th> 
                            <th>Delete</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <?php
                     $result = mysqli_query($db,"SELECT tbl_sales.total_discount,LPAD(tbl_sales.dr_no,4,0) as dr_no,tbl_customers.full_name,tbl_sales.sales_id,LPAD(tbl_sales.sales_no,4,0) as sales_no,DATE_FORMAT(tbl_sales.dates,'%m/%d/%Y') as dates,DATE_FORMAT(tbl_sales.dates,'%Y/%m/%d') as dates1,tbl_sales.VAT,tbl_sales.total_amount,tbl_sales.total_sales,tbl_sales.due_date,tbl_sales.amount_net,tbl_sales.status,tbl_customers.cus_id,tbl_sales.discount1,tbl_sales.discount2 FROM tbl_customers INNER JOIN tbl_sales ON tbl_sales.cus_id=tbl_customers.cus_id ORDER BY sales_no") or die(mysqli_error());
                      // $result = mysqli_query($db, "SELECT * FROM tbl_sales") or die(mysql_error());

                    ?>
                    <tbody>
                      <?php 
                      $o=1;
                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $o++; ?></td>
                            <td><?php echo $row['sales_no']; ?></td>
                            <td><?php echo $row['dr_no']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>            
                            <td><?php echo $row['dates']; ?></td> 
                            <td><?php echo $row['VAT']; ?></td> 
                            <td><?php echo number_format($row['total_amount'],2); ?></td> 
                            <td><?php echo number_format($row['total_sales'],2); ?></td> 
                            <td><?php echo number_format($row['amount_net'],2); ?></td>  
                            <td><?php echo $row['discount1']?></td>
                            <td><?php echo $row['discount2']?></td>
                            <td><?php echo $row['total_discount']?></td>
                            <td><?php echo $row['due_date'];?></td>
                            <td>
                            <?php
                              if ($row['status']=='UNPAID') {
                                ?>
                                <span class="label label-warning"><?php echo $row['status'];?></span>
                                <?php
                              }else if ($row['status']=='PARTIALLY PAID') {
                                ?>
                                <span class="label label-info"><?php echo $row['status'];?></span>
                                <?php
                              }else if($row['status']=='PAID'){
                                ?>
                                <span class="label label-success"><?php echo $row['status'];?></span>
                                <?php
                              }else{
                                ?>
                                <span class="label label-danger"><?php echo $row['status'];?></span>
                                <?php
                              }
                             ?>
                             </td>  
                             <td>
                             <?php
                              if ($row['status']!='CANCELLED') {
                             ?>
                               <form method="POST" action="print.php" target="_blank">
                                 <input type="hidden" name="sales_no" value="<?php echo $row['sales_no']?>">
                                 <input type="hidden" name="cus_id" value="<?php echo $row['cus_id']?>">
                                 <button class="btn btn-info btn-sm" name="printSI" data-toggle="tooltip" data-placement="right" title="Sales Invoice"><b class="fa fa-print fa-bg">&nbsp;</b></button>
                                 <button class="btn btn-default btn-sm" name="printDR" data-toggle="tooltip" data-placement="right" title="Delivery Receipt"><b class="fa fa-print fa-bg">&nbsp;</b></button>
                               </form>
                               
                             <?php 
                              }else{
                             ?>
                                 <b class="fa fa-check fa-bg"></b>
                             <?php
                              }
                             ?>
                             </td>
                             <td>
                              <button class="btn btn-warning btn-sm btn-edits" name="" data-toggle="modal" data-target="#edit" data-si="<?php echo $row['sales_no']; ?>" data-cus="<?php echo $row['cus_id']; ?>" data-date="<?php echo $row['dates1']?>" data-less="<?php echo $row['VAT']; ?>" data-gross="<?php echo $row['total_amount']; ?>" data-net="<?php echo $row['total_sales']; ?>" data-vat="<?php echo $row['amount_net']; ?>" data-dis1="<?php echo $row['discount1']; ?>" data-dis2="<?php echo $row['discount2']; ?>" data-dr="<?php echo $row['dr_no']; ?>" data-tdis="<?php echo $row['total_discount']; ?>" data-due="<?php echo $row['due_date']; ?>"><b class="fa fa-pencil fa-bg">&nbsp;
                             </b></button>
                             </td>
                             <td>
                             <?php 
                             if ($user_type=='admin') {
                             ?>
                             <button class="btn btn-danger btn-sm btn-deletes" name="" data-si="<?php echo $row['sales_no']?>" data-toggle="modal" data-target="#delete"><b class="fa fa-trash fa-bg">&nbsp;
                             </b></button>
                             <?php
                             }
                             ?>
                             </td>
                             <td>
                             <?php
                             if ($row['status']=='PAID'||$row['status']=='CANCELLED') {
                             ?>
                             <b class="fa fa-check fa-bg"></b>
                             <?php
                             }else{
                             ?>
                               <button type="button" data-sale="<?php echo $row['sales_no'];?>" class="cancel btn btn-primary btn-sm" data-toggle="modal"  data-target="#cancel"><b class="fa fa-close fa-bg"></b></button>
                              <?php
                              }
                              ?>
                             </td>
                          </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                    </tfoot>
                </table>            
                </div>
          </div>
<div id="cancel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cancel Sales Invoice</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
                <input type="text" id="sales_no" name="si_no" hidden="">
                <b><strong>Are you sure do you want to cancel this sales invoice?</strong></b>
      </div>
      <div class="modal-footer">
            <button class="btn btn-default" type="submit" name="cancel"><b class="fa fa-check fa-bg">&nbsp;</b>Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><b class="fa fa-close fa-bg">&nbsp;</b>No</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Delete -->
<?php 
if ($user_type=='admin') {
?>
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Sales Invoice</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
        <input type="number" step="any" id="del_si" name="del_si" hidden="">
        <b><strong>Are you sure do you want to delete this sales invoice?</strong></b>
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" type="submit" name="delete"><b class="fa fa-check fa-bg">&nbsp;</b>Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><b class="fa fa-close fa-bg">&nbsp;</b>No</button>
      </div>
      </form>
    </div>

  </div>
</div>          
<?php 
}
?>
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Sales Invoice</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
        <div class="input-group">
          <span class="input-group-addon">Sales Invoice No:</span>  
          <input type="number" step="any" name="edit_si" id="edit_si" class="form-control" readonly="">
        </div>
        <div class="input-group">
          <span class="input-group-addon">Delivery Receipt No:</span>  
          <input type="number" step="any" name="edit_dr" id="edit_dr" class="form-control">
        </div>
        <div class="input-group">
          <span class="input-group-addon">Customers:</span>  
          <select name="edit_cus" class="form-control">
            <?php  
            $cus = mysqli_query($db,"SELECT * FROM tbl_customers");
            while ($rows = mysqli_fetch_assoc($cus)) {
              echo "<option value=".$rows['cus_id'].">".$rows['full_name']."</option>";    
            }
            ?>
          </select>
        </div>
        <div class="input-group date form_date">
            <span class="input-group-addon" >Date:</span>
            <input name="edit_date" id="edit_date" class="form-control" size="16" type="text" placeholder="">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Less: %</span>  
            <input type="number" step="any" name="edit_less" id="edit_less" class="form-control" readonly="">    
        </div>
        <div class="input-group">
            <span class="input-group-addon">Gross:</span>  
            <input type="number" step="any" name="edit_gross" id="edit_gross" class="form-control">    
        </div>
        <div class="input-group">
            <span class="input-group-addon">Net:</span>  
            <input type="number" step="any" name="edit_net" id="edit_net" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">VAT:</span>  
            <input type="number" step="any" name="edit_vat" id="edit_vat" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Discount 1:</span>  
            <input type="number" step="any" name="edit_dis1" id="edit_dis1" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Discount 2:</span>  
            <input type="number" step="any" name="edit_dis2" id="edit_dis2" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon">Total Discount:</span>  
            <input type="number" step="any" name="edit_tdis" id="edit_tdis" class="form-control">
        </div>
         <div class="input-group date form_date">
            <span class="input-group-addon" >Due Date:</span>
            <input name="edit_due" id="edit_due" class="form-control" size="16" type="text" placeholder="">
        </div>
        <!-- <input type="text" step="any" name="edit_due" id="edit_due" class="form-control"> -->
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" type="submit" name="update"><b class="fa fa-check fa-bg">&nbsp;</b>Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><b class="fa fa-close fa-bg">&nbsp;</b>No</button>
      </div>
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
<!-- DatePicker -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="../js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var user = $("#user").val();
  var table = $('#datatables').dataTable({
      "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
           var min = $("#min").val();
            var max = $("#max").val();
            // Total over all pages
              // total = api
              //     .column( 4 )
              //     .data()
              //     .reduce( function (a, b) {
              //         return intVal(a) + intVal(b);
              //     }, 0 );
  
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal1 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal2 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal3 = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            // Update footer
            $(api.column(1).footer()).html(
                'Date From: '+min
            );
            $(api.column(2).footer()).html(
                'Date To: '+max
            );
            $( api.column( 5 ).footer() ).html(
                'Total: ₱'+pageTotal.toFixed(2)
            );
            $( api.column( 6 ).footer() ).html(
                'Total: ₱'+pageTotal1.toFixed(2)
            );
            $( api.column( 7 ).footer() ).html(
                'Total: ₱'+pageTotal2.toFixed(2)
            );
            $( api.column( 10 ).footer() ).html(
                'Total: ₱'+pageTotal3.toFixed(2)
            );
        },
        "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        // fixedColumns:{
        //     leftColumns: 3
        // },
        "oLanguage": {
          "sSearch": "<b class='fa fa-search fa-lg'>&nbsp;</b>",
          "sLengthMenu": "<b id='data-menu'><b class='fa fa-eye fa-lg'>&nbsp;</b>Show _MENU_ records</b>&nbsp;"
        },
        "pagingType": "full_numbers",
        dom: 'lBfrtip',
        buttons: [
            {
              extend:'colvis', "text":'<span class="fa fa-eye fa-lg">&nbsp;Column Visibility</span>',"className": 'btn btn-default btn-xs',
              collectionLayout: 'fixed two-column'
            },
            {
              "extend":'copyHtml5', "text":'<span class="fa fa-copy fa-lg">&nbsp;</span>Copy',"className": 'btn btn-primary btn-xs',footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },{
              "extend":'excelHtml5', "text":'<span class="fa fa-file-excel-o fa-lg">&nbsp;</span>Excel',"className": 'btn btn-primary btn-xs',footer: true, 
              exportOptions: {
                    // columns: ':visible',
                    columns: [ 0, 1,2,3,4,5,6,7,8,9,10,11,12],
                }
            },{
              "extend":'print', "text":"<span class='fa fa-print fa-lg'>&nbsp;</span>Print",title:'',"className": 'btn btn-primary btn-xs',footer: true,autoPrint:true, 
              exportOptions: {
                    // columns: ':visible',
                    columns: [ 0, 1,2,3,4,5,6,7,8,9,10,11,12],
                    stripHtml: true
                },
                message:"<img src='../img/bg.png' style='height:100px;width:400px;'>"+"<br><b style='font-size:20px;'>Book Sales Report</b> <br>"+"Printed By: "+user
            }
        ]
    });
    $('.min,.max').datepicker({format: "mm-dd-yyyy",'clearBtn':true,todayHighlight:true,autoclose:true}).change(function () {
           table.fnFilter();
    });
    // DateRange
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
      var min = $('.min').datepicker('getDate');
      var max = $('.max').datepicker('getDate');
      var startDate = new Date(data[3]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if(max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    });   
    $(".cancel").click(function(event) {
      var sales = $(this).data('sale');
      $("#sales_no").val(sales);
    });
    $("#not").click(function(event) {
        $("#notify").hide();
    });
    $(".btn-deletes").click(function(event) {
       var si = $(this).data('si');
       $("#del_si").val(si);
    });
    $(".btn-edits").click(function(event) {
      var si = $(this).data('si');
      var cus = $(this).data('cus');
      var date = $(this).data('date');
      var less = $(this).data('less');
      var gross = $(this).data('gross');
      var net = $(this).data('net');
      var vat = $(this).data('vat');
      var dis1 = $(this).data('dis1');
      var dis2 = $(this).data('dis2');
      var tdis = $(this).data('tdis');
      var due = $(this).data('due');
      var dr = $(this).data('dr');
      $("#edit_si").val(si);
      $("#edit_cus").val(cus);
      $("#edit_date").val(date);
      $("#edit_less").val(less);
      $("#edit_gross").val(gross);
      $("#edit_net").val(net);
      $("#edit_vat").val(vat);
      $("#edit_dis1").val(dis1);
      $("#edit_dis2").val(dis2);
      $("#edit_tdis").val(tdis);
      $("#edit_due").val(due);
      $("#edit_dr").val(dr);
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
    });
});
</script>
</body>
</html>