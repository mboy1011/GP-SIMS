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
    <link rel="stylesheet" type="text/css" href="../css/buttons.bootstrap.min.css">
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
              <li class="active">Inventory Out</li>
              </ol>
              <hr>
            </div>
        </div>
<?php
    if (isset($_POST['update'])) {
        $cm = mysqli_real_escape_string($db,$_POST['cm']);
        $si = mysqli_real_escape_string($db,$_POST['si']);
        $cus = mysqli_real_escape_string($db,$_POST['cus']);
        $res = mysqli_real_escape_string($db,$_POST['res']);
        $ta = mysqli_real_escape_string($db,$_POST['ta']);
        $sm = mysqli_real_escape_string($db,$_POST['sm']);
        $date = mysqli_real_escape_string($db,$_POST['date']);
        $sql = $oop->upCM($cm,$si,$cus,$res,$ta,$sm,$date);
        if(!$sql){
           ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Update!</strong> Try Again.
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
    }elseif (isset($_POST['delete'])) {
        $did = mysqli_real_escape_string($db,$_POST['delid']);
        $sql = $oop->delPro($did);
        if(!$sql){
           ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Customer!</strong> Try Again.
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
?>        
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
            <div class="col-sm-3"><a href="addCM"><button class="btn btn-info form-control"> <i class="fa fa-plus">&nbsp;</i>Add C/D Memo</button></a></div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>CM No.</th>
                            <th>Sales No.</th>
                            <th>Customer Name</th>
                            <th>Reason</th>
                            <th>Total Amount</th>
                            <th>Salesman</th>
                            <th>Date</th>
                            <th>Info</th>
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db,"SELECT * FROM tbl_CM INNER JOIN tbl_customers ON tbl_customers.cus_id=tbl_CM.cus_id") or die(mysql_error());
                      $i=1;
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo sprintf('%04d',$row['cm_no']); ?></td>
                            <td><?php echo sprintf('%04d',$row['sales_no']); ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['cm_reason']; ?></td>
                            <td><?php echo number_format($row['cm_totalAmount'],2); ?></td>
                            <td><?php echo $row['salesman']?></td>
                            <td><?php echo $row['cm_date']; ?></td>
                            <td><button class="b-infos btn btn-info btn-xs" id="infos" data-cm="<?php echo $row['cm_no'];?>"><span class="fa fa-question"></span></button>
                            </td>
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edits btn btn-warning btn-xs" data-cm="<?php echo $row['cm_no']; ?>" data-si="<?php echo $row['sales_no']; ?>" data-cus="<?php echo $row['full_name']; ?>" data-res="<?php echo $row['cm_reason']; ?>" data-ta="<?php echo $row['cm_totalAmount']; ?>" data-sm="<?php echo $row['salesman']; ?>" data-date="<?php echo $row['cm_date']; ?>"  data-title="Edit"  data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                                <b data-placement="top" title="Delete"><button class="btn-deletes btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['cm_id']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
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
                        </tr>
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
        <h4 class="modal-title">Edit Credit/Debit Memo</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
          <div class="input-group">
            <span class="input-group-addon">CM No.:</span>  
            <input type="text" name="cm" id="cm_edits" class="form-control" readonly="">    
          </div>
          <div class="input-group">
            <span class="input-group-addon">Sales No.:</span>  
            <input type="text" name="si" id="si_edits" class="form-control" readonly="">    
          </div>
          <div class="input-group">
            <span class="input-group-addon">Customer:</span>  
            <input type="text" name="cus" id="cus_edits" class="form-control" readonly="">    
          </div>
          <textarea name="res" class="form-control" id="res_edits">
            
          </textarea>
          <div class="input-group">
            <span class="input-group-addon">Total Amount:</span>  
            <input type="text" name="ta" id="ta_edits" class="form-control">    
          </div>
          <div class="input-group">
            <span class="input-group-addon">Salesman:</span>  
            <input type="text" name="sm" id="sm_edits" class="form-control">    
          </div>
          <div class="input-group date form_date">
            <span class="input-group-addon">Date:</span>  
            <input type="text" name="date" id="date_edits" class="form-control">    
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-warning" name="update">Update</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </form>
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
<!-- Info -->
<div id="info" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Credit Memo Details</h4>
      </div>
      <div class="modal-body">
          <div class="panel-body" style="height:200px; overflow-y: auto;">
                <div class="table-responsive">      
                  <table class="table table-hover table-fixed table-striped">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Particular</th>
                        <th>QTY</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody id="cm_details">
                    </tbody>
                  </table>       
                </div>
          </div><!-- panel body-->
      </div>
    </div>
    <!-- Update Amount Modal -->
    <div id="editAm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Amount</h4>
          </div>
          <div class="modal-body">
          <input type="number" step="any" id="upAmount" name="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" id="upOk">Ok</button>
            <button type="button" class="btn btn-primary" id="upNo">Cancel</button>
          </div>
        </div>

      </div>
    </div>
    <!--  -->
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
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var table = $('#datatables').dataTable({
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var min = $("#min").val();
            var max = $("#max").val();
            // // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                    i : 0;
            };
            $(api.column(1).footer()).html(
                'Date From: '+min
            );
            $(api.column(2).footer()).html(
                'Date To: '+max
            );
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            $( api.column( 5 ).footer() ).html(
                'Total: ₱'+pageTotal.toFixed(2)
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
                    columns: ':visible'
                }
            },{
              "extend":'pdfHtml5', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs',footer: true, 
              exportOptions: {
                                  columns: ':visible'
                              }                    
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs',footer: true, 
              exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });
    $('.min,.max').datepicker({format: "yyyy-mm-dd",'clearBtn':true,todayHighlight:true,autoclose:true}).change(function () {
        table.fnFilter();
    });
    // DateRange
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
      var min = $('.min').datepicker('getDate');
      var max = $('.max').datepicker('getDate');
      var startDate = new Date(data[7]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate < max) { return true;}
      if(max == null && startDate > min) {return true;}
      if (startDate < max && startDate > min) { return true; }
      return false;
    }); 
    $('.b-infos').click(function(event) {
      var cm = parseInt($(this).data('cm'));
      $.post('showjax.php', {cm_d: cm}, function(data, textStatus, xhr) {
         $("#cm_details").html(data);
         $("#info").modal();
      });
    });
    $('.btn-edits').click(function(event) {
      var cm = $(this).data('cm');
      var si = $(this).data('si');
      var cus = $(this).data('cus');
      var res = $(this).data('res');
      var ta = $(this).data('ta');
      var sm = $(this).data('sm');
      var date = $(this).data('date');
      $("#cm_edits").val(cm);
      $("#si_edits").val(si);
      $("#cus_edits").val(cus);
      $("#res_edits").text(res);
      $("#ta_edits").val(ta);
      $("#sm_edits").val(sm);
      $("#date_edits").val(date);
      // console.log(cm+''+si+cus+res+ta+sm+dadate_editste);
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