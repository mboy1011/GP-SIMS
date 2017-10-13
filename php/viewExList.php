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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- DatePicker -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker3.min.css">
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
              <li class="active">Expenses Lists</li>
              </ol>
              <hr>
            </div>
        </div>
<?php
    if (isset($_POST['deleteExp'])) {
        $did = mysqli_real_escape_string($db,$_POST['delid']);
        $sql = $oop->deleteExp($did);
        if(!$sql){
           ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Expenses!</strong> Try Again.
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
    }else if (isset($_POST['addEXP'])) {
        $cn = mysqli_real_escape_string($db,$_POST['custname']);
        $dt = mysqli_real_escape_string($db,$_POST['date']);
        $ca = mysqli_real_escape_string($db,$_POST['category']);
        $am = mysqli_real_escape_string($db,$_POST['amount']);
        $sql = $oop->insertExp($cn,$dt,$ca,$am);
        if(!$sql){
            ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Already Added!</strong>
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
    }else if (isset($_POST['updateExp'])) {
        $cn = mysqli_real_escape_string($db,$_POST['upcustname']);
        $dt = mysqli_real_escape_string($db,$_POST['update']);
        $ca = mysqli_real_escape_string($db,$_POST['upcategory']);
        $am = mysqli_real_escape_string($db,$_POST['upamount']);
        $id = mysqli_real_escape_string($db,$_POST['upid']);
        $sql = $oop->updateExp($cn,$dt,$ca,$am,$id);
        if(!$sql){
            ?>
              <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Failed to Update! Try Again.</strong>
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
          <div class="col-sm-4">
            
          </div>
          <div class="col-sm-2">
            <button type="button" data-toggle="modal" data-target="#addexp" class="btn btn-info btn-sm form-control"><b class="fa fa-plus">&nbsp;</b>Add Expenses</button>
          </div>
          <!-- Modal -->
          <div id="addexp" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Expenses</h4>
                </div>
                <form method="POST" action="">
                <div class="modal-body">
                  <div class="input-group">
                    <span class="input-group-addon">Customer Name: </span>
                    <input type="text" name="custname" class="form-control" required="">
                  </div>
                  <div class="input-group date form_date">
                    <span class="input-group-addon" ><b class="fa fa-calendar"></b></span>
                    <input name="date" id="dateToday" class="form-control" size="16" type="text" placeholder="">
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Category:</span>
                    <select name="category" class="form-control" >
                            <?php
                              $result =mysqli_query($db, "SELECT * FROM tbl_category");
                              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo"<option value='$row[cat_id]'>";
                                echo $row['cat_name'];
                                echo"</option>";
                              }
                            ?>
                   </select>
                 </div>
                 <div class="input-group">
                  <span class="input-group-addon">Amount: ₱</span>
                  <input type="number" step="any" name="amount" class="form-control" required="">
                 </div> 
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="addEXP">Submit</button>  
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">                  
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Date Added</th>
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT tbl_expenses.timestamp,tbl_expenses.ex_id,tbl_expenses.cat_id,tbl_expenses.ex_custName,tbl_expenses.ex_amount,tbl_category.cat_name,DATE_FORMAT(tbl_expenses.ex_date,'%m-%d-%Y') as ex_date FROM tbl_expenses INNER JOIN tbl_category ON tbl_category.cat_id=tbl_expenses.cat_id ORDER BY tbl_expenses.ex_id ASC") or die(mysql_error());
                      $i=1;
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['cat_name']?></td>
                            <td><?php echo $row['ex_custName']; ?></td>
                            <td><?php echo $row['ex_date']; ?></td>
                            <td><?php echo number_format($row['ex_amount'],2); ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edits btn btn-warning btn-xs"  data-title="Edit" data-cus="<?php echo $row['ex_custName'];?>" data-cat="<?php echo $row['cat_id'];?>" data-am="<?php echo $row['ex_amount'];?>" data-date="<?php echo $row['ex_date']?>" data-id="<?php echo $row['ex_id']; ?>" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                              <?php 
                             if ($user_type=='admin') {
                             ?>
                                <b data-placement="top" title="Delete"><button class="btn-deletes btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['ex_id']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
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
        <h4 class="modal-title">Edit Expenses Details</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
          <input type="hidden" name="upid" id="exid">
          <div class="input-group">
            <span class="input-group-addon">Customer Name: </span>
            <input type="text" id="cust" name="upcustname" class="form-control" required="">
          </div>
          <div class="input-group date form_date">
            <span class="input-group-addon" ><b class="fa fa-calendar"></b></span>
            <input name="update" id="tod" class="form-control" size="16" type="text" placeholder="">
          </div>
          <div class="input-group">
          <span class="input-group-addon">Category:</span>
            <select name="upcategory" id="cat" class="form-control" >
                    <?php
                      $result =mysqli_query($db, "SELECT * FROM tbl_category");
                      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo"<option value='$row[cat_id]'>";
                        echo $row['cat_name'];
                        echo"</option>";
                      }
                    ?>
           </select>
         </div>
         <div class="input-group">
          <span class="input-group-addon">Amount: ₱</span>
          <input type="number" step="any" id="am" name="upamount" class="form-control" required="">
         </div> 
      </div>
      <div class="modal-footer">
        <button type="submit" name="updateExp" class="btn btn-warning">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
        <h4 class="modal-title">Delete Expenses</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
        <input type="hidden" name="delid" id="delid">
        <strong>Are you sure you want to delete?</strong>
      </div>
      <div class="modal-footer">
         <button type="submit" name="deleteExp" class="btn btn-danger">Delete</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
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
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var a = $('#dateTo').val();
    var b = $('#dateFrom').val();
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('.form_date').datepicker({
      format: "yyyy-mm-dd",
      language: 'en-AU',
      todayHighlight: true,
      setDate: today,
      autoclose: true
    }).datepicker('setDate', new Date());
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
 
            // Total over all pages
              // total = api
              //     .column( 4 )
              //     .data()
              //     .reduce( function (a, b) {
              //         return intVal(a) + intVal(b);
              //     }, 0 );
  
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                'Total: ₱'+pageTotal
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
              "extend":'pdfHtml5', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs' ,footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs',footer: true,
              message: 'Date From:'+'Date To:',
              exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });
    $("#print").click(function(event) {
       var a = $('#min').val();
        var b = $('#max').val();
        $('#min').val(a);
        $("#max").val(b);
    });
    $('.min,.max').datepicker({'clearBtn':true,todayHighlight:true,autoclose:true}).change(function () {
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
    $('.btn-edits').click(function(event) {
        var cus = $(this).data('cus');
        var cat = $(this).data('cat');
        var date = $(this).data('date');
        var am = $(this).data('am');
        var id = $(this).data('id');
        $("#cust").val(cus);
        $("#tod").val(date);
        $("#cat").val(cat);
        $("#am").val(am);
        $("#exid").val(id);
    });
    $('.btn-deletes').click(function(event) {
       var did = $(this).data('did');
       $("#delid").val(did);
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