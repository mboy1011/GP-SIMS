<?php
require 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
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
                        $sql5 = mysqli_query($db,"SELECT count(*) as total FROM tbl_overdue");
                        $result5 = mysqli_fetch_array($sql5,MYSQLI_ASSOC);
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
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail" style="background-color: #003366;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">₱
                    <?php 
                        $sql7 = mysqli_query($db,"SELECT SUM(ex_amount) as total FROM tbl_expensesToday");
                        $result7 = mysqli_fetch_array($sql7,MYSQLI_ASSOC);
                        echo number_format($result7['total'],2);
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        EXPENSES TODAY
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail" style="background-color: #003366;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">₱
                    <?php 
                        $sql8 = mysqli_query($db,"SELECT SUM(ex_amount) as total FROM tbl_expenses");
                        $result8 = mysqli_fetch_array($sql8,MYSQLI_ASSOC);
                        echo number_format($result8['total'],2);
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        TOTAL EXPENSES
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail" style="background-color: #003366;color: #fff; text-align: center;">
                    <b style="font-size: 50px;">₱
                    <?php 
                        $sql9 = mysqli_query($db,"SELECT SUM(Total) as total FROM tbl_monthly_income");
                        $result9 = mysqli_fetch_array($sql9,MYSQLI_ASSOC);
                        echo number_format($result9['total'],2);
                    ?>
                    </b>
                    <div class="caption" style="color:#fff;">
                        TOTAL INCOME
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="sales"></canvas>            
            </div>
            <div class="col-md-6">
                <canvas id="expenses"></canvas>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="products"></canvas>
            </div>
             <div class="col-md-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">Last Expenses</div>
                  <div class="panel-body" style="height: 225px;overflow-y: auto;">
                      <table class="table table-hover table-fixed table-striped">
                          <thead class="thead-inverse">
                              <tr>
                                  <th>ID</th>
                                  <th>Date</th>
                                  <th>Category</th>
                                  <th>Customer</th>
                                  <th>Amount</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $queryExp = mysqli_query($db,"SELECT * FROM tbl_expensesLast INNER JOIN tbl_category ON tbl_expensesLast.cat_id=tbl_category.cat_id LEFT JOIN tbl_employee ON tbl_employee.emp_id=tbl_expensesLast.emp_id");
                            $i=1; 
                            while($row = mysqli_fetch_array($queryExp,MYSQLI_ASSOC)){?>
                              <tr>
                                  <td><?php echo $i++;?></td>
                                  <td><?php echo $row['ex_date'];?></td>
                                  <td><?php echo $row['cat_name'];?></td>
                                  <td><?php echo $row['fname']." ".$row['lname'];?></td>
                                  <td><?php echo number_format($row['ex_amount'],2);?></td>
                              </tr>
                            <?php }?>
                          </tbody>
                      </table>
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
<script type="text/javascript" src="../js/Chart.min.js"></script>
<script type="text/javascript">
$(function() {
var ctx1 = $("#sales");
var ctx2 = $("#products");
var ctx3 = $("#expenses");
var a = $("#si").val();
var b = $("#pd").val();
var c = $("#up").val();
var d = $("#pp").val();
var e = $("#cn").val();
var f = $("#od").val();
// $("#year2").click(function(event) {
//     var yr2 = $("#yr2 option:selected").text();
    $.post('data', {product:"product"}, function(data, textStatus, xhr) {
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
                text: 'MONTHLY INVENTORY OUT'
            }
        }
        });
    });
// });
// $("#year1").click(function(event) {
//    var yr = $("#yr option:selected").text();
$.post('data', {sales:"sales"}, function(data, textStatus, xhr) {
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
            text: 'MONTHLY INCOME'
        }
    }
    });
});
// });
// 
$.post('data', {expenses:"expenses"}, function(data, textStatus, xhr) {
    var obj = JSON.parse(data);
    var label = [];
    var total = [];
    for (var i = 0; i < obj.length; i++) {
        label.push(obj[i].Month);
        total.push(obj[i].Total);
    }
   var expenses = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: [],
            data: total,
            backgroundColor: 'rgba(26, 255, 140,0.5)',
            borderColor:    'rgba(26, 255, 140,1)'
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
            text: 'MONTHLY EXPENSES'
        }
    }
    });
});
// 
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