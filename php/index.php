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
 <style type="text/css" media="screen">
     #notify{
         background-color: #ff3333;
         color: #fff;
     }
 </style>
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
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="not"><i class="fa fa-bell fa-lg"></i><span class="label label-warning badge" id="notify">
                    <?php
                        $count = 0;
                        $count1 = 0;
                        $sql = mysqli_query($db,"SELECT * FROM tbl_expired_products");
                        $sql2 = mysqli_query($db,"SELECT * FROM tbl_outofstocks");
                        mysqli_query($db,"UPDATE tbl_products SET status='EXPIRING' WHERE expiry_date<=DATE_ADD(CURDATE(),INTERVAL 6 MONTH)");
                        mysqli_query($db,"UPDATE tbl_products SET status='OUT OF STOCKS' WHERE quantity=0");
                        $count = mysqli_num_rows($sql);
                        $count1 = mysqli_num_rows($sql2);
                        $count+=$count1;
                        echo $count;
                    ?>
                    </span>
                </a> 
               <ul class="dropdown-menu">
                   <li>
                   <?php 
                        while ($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Expiring Product</li>";
                            echo "<li><a href='viewProduct.php'>".$row['name'].' '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($sql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct.php'>".$rows['name'].' '.$rows['packing']."</a></li>";
                        }
                   ?>
                   </li>
                   <li class='divider'></li>
               </ul>
            </li>          
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
            
            <div class="col-sm-1">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <canvas id="sales"></canvas>            
            </div>
            <div class="col-sm-6">
                <canvas id="products"></canvas>
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
var ctx1 = $("#sales");
var ctx2 = $("#products");
var a = $("#si").val();
var b = $("#pd").val();
var c = $("#up").val();
var d = $("#pp").val();
var e = $("#cn").val();
var f = $("#od").val();
// $("#year2").click(function(event) {
//     var yr2 = $("#yr2 option:selected").text();
    $.post('data2.php', {}, function(data, textStatus, xhr) {
        var obj2 = JSON.parse(data);
        var label2 = [];
        var total2 = [];
        for (var i = 0; i < obj2.length; i++) {
            label2.push(obj2[i].Month);
            total2.push(obj2[i].Total);
        }
        var products = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: label2,
            datasets: [{
                label: [],
                data: total2,
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                borderColor:    'rgba(1, 1, 1, 0.5)'
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
                text: 'Total Products Out'
            }
        }
        });
    });
// });
// $("#year1").click(function(event) {
//    var yr = $("#yr option:selected").text();
$.post('data.php', {}, function(data, textStatus, xhr) {
    var obj = JSON.parse(data);
    var label = [];
    var total = [];
    for (var i = 0; i < obj.length; i++) {
        label.push(obj[i].Month);
        total.push(obj[i].Total);
    }
   var sales = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: label,
        datasets: [{
            label: [],
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
// });
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