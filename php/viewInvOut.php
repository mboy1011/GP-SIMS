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
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
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
              <li class="active">Inventory Out</li>
              </ol>
              <hr>
            </div>
        </div>       
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT tbl_salesdetails.quantity,tbl_products.name,tbl_products.description,tbl_products.lot_no,DATE_FORMAT(tbl_salesdetails.timestamp,'%m-%d-%Y') as cur_date FROM tbl_salesdetails INNER JOIN tbl_products ON tbl_products.prod_id=tbl_salesdetails.prod_id WHERE tbl_salesdetails.quantity!=0 ORDER BY tbl_salesdetails.timestamp ASC") or die(mysql_error());
                      $i=1;
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['name']." ".$row['description']." (".$row['lot_no'].")"; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['cur_date']; ?></td>
                          </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tfoot>
                </table>            
                </div>
          </div>
        </div>
<!-- Update -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Inventory Out</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
</div>  
<!-- Delete -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Inventory Out</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
         
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
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            $( api.column( 2 ).footer() ).html(
                'Total: '+pageTotal.toFixed(2)
            );
        },
       "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        // fixedColumns:{
        //     leftColumns: 2
        // },
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
    $('.btn-edits').click(function(event) {
        
    });
    $('.btn-deletes').click(function(event) {
       
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
});
</script>
</body>
</html>