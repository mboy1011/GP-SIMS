<?php
include 'session.php';
include 'crud.php';
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
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style type="text/css" media="screen">
.modal-header{
  background-color: #4dffb8;
  color: #fff;
}
.modal-footer{
    background-color: #333333;
} 
/*Full View for Modals*/
/*.modal-dialog {
      width: 100%;
      height: 100%;
      padding: 0;
      margin:0;
}
.modal-content {    
      height: 100%;
      border-radius: 0;
      color:white;
      overflow:auto;
}*/
#datatables_filter
{
  color: #c68c53;
}
#data-menu
{
  color: #c68c53;
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
              <li class="active">View Sales Report</li>
              </ol>
          <hr>
          </div>
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
      }
?>
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Sales No.</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Less: VAT</th>
                            <th>Gross</th>
                            <th>Net Sales</th>
                            <th>VAT</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Print</th> 
                            <th>Delete</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <?php
                     $result = mysqli_query($db,"SELECT tbl_customers.full_name,tbl_sales.sales_id,tbl_sales.sales_no,tbl_sales.dates,tbl_sales.VAT,tbl_sales.total_amount,tbl_sales.total_sales,tbl_sales.due_date,tbl_sales.amount_net,tbl_sales.status,tbl_customers.cus_id FROM tbl_customers INNER JOIN tbl_sales ON tbl_sales.cus_id=tbl_customers.cus_id") or die(mysqli_error());
                      // $result = mysqli_query($db, "SELECT * FROM tbl_sales") or die(mysql_error());

                    ?>
                    <tbody>
                      <?php 
                      $o=1;
                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $o++; ?></td>
                            <td><?php echo $row['sales_no']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>            
                            <td><?php echo $row['dates']; ?></td> 
                            <td><?php echo $row['VAT']; ?>%</td> 
                            <td>₱<?php echo number_format($row['total_amount'],2); ?></td> 
                            <td>₱<?php echo number_format($row['total_sales'],2); ?></td> 
                            <td>₱<?php echo number_format($row['amount_net'],2); ?></td>  
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
                             <form method="POST" action="print.php">
                               <input type="hidden" name="sales_no" value="<?php echo $row['sales_no']?>">
                               <input type="hidden" name="cus_id" value="<?php echo $row['cus_id']?>">
                               <button class="btn btn-info btn-sm" name="print"><b class="fa fa-print fa-bg">&nbsp;</b></button>
                             </form>
                             </td>
                             <td><button class="btn btn-danger btn-sm" name="delete"><b class="fa fa-trash fa-bg">&nbsp;
                             </b></button></td>
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
                </table>            
                </div>
          </div>
<div id="cancel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Customer</h4>
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
<script type="text/javascript" src="../js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datatables').dataTable({
        "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:{
            leftColumns: 3
        },
        "oLanguage": {
          "sSearch": "<b class='fa fa-search fa-lg'>&nbsp;</b>",
          "sLengthMenu": "<b id='data-menu'><b class='fa fa-eye fa-lg'>&nbsp;</b>Show _MENU_ records</b>&nbsp;"
        },
        "pagingType": "full_numbers",
        dom: 'lBfrtip',
        buttons: [
            {
              "extend":'copy', "text":'<span class="fa fa-copy fa-lg">&nbsp;</span>Copy',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'excel', "text":'<span class="fa fa-file-excel-o fa-lg">&nbsp;</span>Excel',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'pdf', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs' 
            }
        ]
    });
    $(".cancel").click(function(event) {
      var sales = $(this).data('sale');
      $("#sales_no").val(sales);
    });
});
</script>
</body>
</html>