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
            <li  class="active">
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
    <div class="container-fluid bootstrap snippet">
        <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb">
                <li class="active"><b class="fa fa-tachometer fa-bg">&nbsp;</b>Dashboard</li>
              </ol>
              <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-2">
                <div class="thumbnail" style="background-color: #333; color: #fff; text-align: center;">
                <b style="font-size: 50px;">
                    <?php 
                        $sql1 = mysqli_query($db,"SELECT count(sales_no) as total FROM tbl_sales");
                        $result1 = mysqli_fetch_array($sql1,MYSQLI_ASSOC);
                        echo $result1['total'];
                    ?>
                </b>
                    <div class="caption" style="color: #fff;">
                        SALES INVOICES
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-2">
                <div class="thumbnail" style="background-color: #00e673;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">
                    <?php
                        $sql2 = mysqli_query($db,"SELECT count(sales_no) as total FROM tbl_sales WHERE status = 'PAID'");
                        $result2 = mysqli_fetch_array($sql2,MYSQLI_ASSOC);
                        echo $result2['total'];
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        PAID
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-2">
                <div class="thumbnail" style="background-color: #ff8000;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">
                    <?php
                        $sql3 = mysqli_query($db,"SELECT count(sales_no) as total FROM tbl_sales WHERE status = 'UNPAID'");
                        $result3 = mysqli_fetch_array($sql3,MYSQLI_ASSOC);
                        echo $result3['total'];
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        UNPAID
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-2">
                <div class="thumbnail" style="background-color: #0000ff;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">
                    <?php
                        $sql4 = mysqli_query($db,"SELECT count(sales_no) as total FROM tbl_sales WHERE status = 'PARTIALLY PAID'");
                        $result4 = mysqli_fetch_array($sql4,MYSQLI_ASSOC);
                        echo $result4['total'];
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        PARTIALLY PAID
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-2">
                <div class="thumbnail" style="background-color: #4d1919;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">
                    <?php
                        $sql6 = mysqli_query($db,"SELECT count(sales_no) as total FROM tbl_sales WHERE status='CANCELLED'");
                        $result6 = mysqli_fetch_array($sql6,MYSQLI_ASSOC);
                        echo $result6['total'];
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        CANCELLED
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-2">
                <div class="thumbnail" style="background-color: #ff0000;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">
                    <?php
                        $sql5 = mysqli_query($db,"SELECT count(sales_no) as total FROM tbl_overdue");
                        $result5 = mysqli_fetch_array($sql5,MYSQLI_ASSOC);
                        mysqli_query($db,"UPDATE tbl_sales SET status='OVERDUE' WHERE due_date=CURDATE() AND status!='CANCELLED'");
                        echo $result5['total'];
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        OVERDUE
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                
            </div>
            <div class="col-sm-4">
                  <div class="input-group">
                 <span class="input-group-addon">Year</span>
                    <select name="" class="form-control" id='yr'>
                            <?php
                            $result =mysqli_query($db, "SELECT Year FROM tbl_monthly_sales_report GROUP BY Year");
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              echo"<option> ";
                              echo $row['Year'];
                              echo"</option>";
                            }
                            ?>
                    </select>
                    <div class="input-group-btn">
                      <button class="btn btn-primary form-control" id="year1" type="submit">
                        <b class="fa fa-paper-plane fa-lg"></b>
                      </button>
                    </div>
                  </div>
            </div>
            <div class="col-sm-1">
                
            </div>
            <div class="col-sm-4">
                  <div class="input-group">
                 <span class="input-group-addon">Year</span>
                    <select name="" class="form-control" id='yr'>
                            <?php
                            $result =mysqli_query($db, "SELECT Year FROM tbl_monthly_sales_report GROUP BY Year");
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                              echo"<option> ";
                              echo $row['Year'];
                              echo"</option>";
                            }
                            ?>
                    </select>
                    <div class="input-group-btn">
                      <button class="btn btn-primary form-control" id="year1" type="submit">
                        <b class="fa fa-paper-plane fa-lg"></b>
                      </button>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <!-- ChartJS -->
                <canvas id="myChart"></canvas>            
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
<script type="text/javascript" src="../js/Chart.min.js"></script>
<script type="text/javascript">
$(function() {
var ctx = $("#myChart");
var a = $("#si").val();
var b = $("#pd").val();
var c = $("#up").val();
var d = $("#pp").val();
var e = $("#cn").val();
var f = $("#od").val();

$("#year1").click(function(event) {
   var yr = $("#yr option:selected").text();
$.post('data.php', {chart: 'chart',year:yr}, function(data, textStatus, xhr) {
    var obj = JSON.parse(data);
    var label = [];
    var total = [];
    for (var i = 0; i < obj.length; i++) {
        label.push(obj[i].Month);
        total.push(obj[i].Total);
    }
   var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: label,
        datasets: [{
            label: [yr],
            data: total,
            backgroundColor: 'rgba(102, 102, 255, 0.2)',
            borderColor:    'rgba(102, 102, 255, 1)'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            xAxes:[{
                ticks:{
                    beginAtZero:true
                }
            }]
        },
        responsive: true,
        title: {
            display: true,
            text: 'Total Sales Chart'
        }
    }
    });
});
});
});

</script>
</body>
</html>