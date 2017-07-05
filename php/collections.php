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
/*Data Tables Search Bar*/
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
            <li class="active">View Collections</li>
            </ol>
            <hr>
          </div>  
        </div>
        <div class="row">
          <div class="col-sm-12">
          <div class="result"></div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Sales No.</th>
                            <th>Customer Name</th>
                            <th>Total Amount Due</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <!-- <tfoot>
                      <tr>
                            <th>ID</th>
                            <th>Sales No.</th>
                            <th>Customer Name</th>
                            <th>Total Amount Due</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>   
                    </tfoot> -->
                    <?php
                    $i=1;
                     $result = mysqli_query($db,"SELECT tbl_customers.full_name,tbl_payments.amount,tbl_sales.sales_no,tbl_payments.balance,tbl_sales.total_amount,tbl_sales.status,tbl_customers.cus_id FROM tbl_customers INNER JOIN tbl_sales ON tbl_sales.cus_id=tbl_customers.cus_id AND tbl_sales.status!='PAID' LEFT JOIN tbl_payments ON tbl_sales.sales_no=tbl_payments.sales_no AND tbl_sales.cus_id=tbl_payments.cus_id AND tbl_payments.balance!=0 WHERE tbl_sales.status!='CANCELLED'") or die(mysqli_error());
                      // $result = mysqli_query($db, "SELECT * FROM tbl_sales") or die(mysql_error());

                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['sales_no']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>            
                            <td>₱<?php echo number_format($row['total_amount'],2); ?></td> 
                            <td>₱<?php echo number_format($row['amount'],2); ?></td> 
                            <td>₱<?php echo number_format($row['balance'],2); ?></td> 
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
                             <button type="button" data-toggle="modal" data-target="#addpay" data-toggle="tooltip" data-cus="<?php echo $row['cus_id'];?>" data-total="<?php echo $row['total_amount'];?>" data-sino="<?php echo $row['sales_no'];?>" data-fn="<?php echo $row['full_name'];?>" title="Add Payment" class="bt-pay btn btn-primary btn-sm"><b class="fa fa-money fa-bg"></b></button>
                               <button type="button" data-toggle="tooltip" title="Print" class="btn btn-info btn-sm"><b class="fa fa-print fa-bg"></b></button>
                             </td>
                          </tr>
                      <?php } ?>
                    </tbody>
                </table>            
                </div>
          </div>
<!-- Modal -->
<div id="addpay" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Payment</h4>
      </div>
      <!-- Form -->
      <form method="POST" action="">
      <div class="modal-body">
          <div class="input-group">
              <span class="input-group-addon">Sales No</span>
              <input type="text" name="sales_no" id="si_no" class="form-control" disabled="">
              <input type="text" name="customerid" id="cust" hidden="">
              <input type="text" name="total" id="total" hidden="">
          </div>   
          <div class="input-group">
              <span class="input-group-addon">Customer Name</span>
              <input type="text" name="" id="payname" class="form-control" disabled="">
          </div>   
          <div class="input-group">
              <span class="input-group-addon">Payment Type</span>
              <select name="paytype" id="paytype" class="form-control">
                <option value="Cash">Cash</option>
                <option value="Check">Check</option>
              </select>
          </div>   
          <div class="input-group">
              <span class="input-group-addon">Amount: <b>₱</b></span>
              <input type="number" id="amount" step="any" name="amount" class="form-control" >
          </div>   
      </div>
      <div class="modal-footer">
      <button type="button" id="addpayment" name="addpay"  data-dismiss="modal" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      <!-- End Form -->
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
            leftColumns: 2
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
    // ,initComplete: function () {
    //      $('.buttons-pdf').html('<span class="fa fa-file-excel-o" data-toggle="tooltip" title="Export To Excel"/>');
    //     }
    $(".bt-pay").click(function(event) {
        var si_no = $(this).data("sino");
        var fn = $(this).data("fn");
        var cus = $(this).data("cus");
        var total = $(this).data("total");
        $("#si_no").val(si_no);
        $("#payname").val(fn);
        $("#cust").val(cus);
        $("#total").val(total);
    });
    $("#addpayment").click(function(event) {
        var si = $("#si_no").val();
        var cu = $("#cust").val();
        var to = $("#total").val();
        var am = $("#amount").val();
        var pa = $("#paytype").val();
        $.post('addpay.php', {addpay:'addpay',si:si,cu:cu,to:to,am:am,pa:pa }, function(data) {
          // if(data.status_code == 1){
          //   $('.result').html(data.status_msg);
          // }else{
          //   $('.result').html(data.status_msg);
          // }
          $('.result').html(data);
        });
    });
    /* Search input in each column on datatables*/
    /*
    // Setup - add a text input to each footer cell
    $('#datatables tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#datatables').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );  
    */  
});
</script>
</body>
</html>
<?php
// "SELECT (SELECT SUM(amount) FROM tbl_payments WHERE tbl_payments.sales_no=tbl_sales.sales_no AND tbl_customers.cus_id=tbl_payments.cus_id) Amount,tbl_customers.full_name,tbl_sales.sales_no,tbl_payments.balance,tbl_sales.total_amount,tbl_sales.status FROM tbl_customers INNER JOIN tbl_sales ON tbl_sales.cus_id=tbl_customers.cus_id AND tbl_sales.status!='PAID' LEFT JOIN tbl_payments ON tbl_sales.sales_no=tbl_payments.sales_no AND tbl_sales.cus_id=tbl_payments.cus_id AND tbl_payments.balance!=0"
?>