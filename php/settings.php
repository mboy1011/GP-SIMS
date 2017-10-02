<?php
include 'session.php';
include 'crud.php';
$oop = new CRUD();
if ($user_type!='admin') {
    header("location:index.php");
}
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
              <li><a href="index.php">Overview</a></li>
              <li class="active">Settings</li>
              </ol>
              <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
<?php
if(isset($_POST['backup'])){                
        $tables = array();
        $query = mysqli_query($db, 'SHOW TABLES');
        while($row = mysqli_fetch_row($query)){
             $tables[] = $row[0];
        }
        $result = "";
        foreach($tables as $table){
            $query = mysqli_query($db, 'SELECT * FROM '.$table);
            $num_fields = mysqli_num_fields($query);
            $result .= 'DROP TABLE IF EXISTS '.$table.';';
            $row2 = mysqli_fetch_row(mysqli_query($db, 'SHOW CREATE TABLE '.$table));
            $result .= "\n\n".$row2[1].";\n\n";
            for ($i = 0; $i < $num_fields; $i++) {
                while($row = mysqli_fetch_row($query)){
                   $result .= 'INSERT INTO '.$table.' VALUES(';
                     for($j=0; $j<$num_fields; $j++){
                       $row[$j] = addslashes($row[$j]);
                       $row[$j] = str_replace("\n","\\n",$row[$j]);
                       if(isset($row[$j])){
                           $result .= '"'.$row[$j].'"' ; 
                        }else{ 
                            $result .= '""';
                        }
                        if($j<($num_fields-1)){ 
                            $result .= ',';
                        }
                    }
                    $result .= ");\n";
                }
            }
            $result .="\n\n";
        }
        //Create Folder
        $folder = 'Backup_Database/';
        if (!is_dir($folder))
        mkdir($folder, 0777, true);
        // chmod($folder, 0777);
        $date = date('m-d-Y'); 
        $filename = $folder."db_backup_".$date; 
        $handle = fopen($filename.'.sql','w+');
        fwrite($handle,$result);
        fclose($handle);
        ?>
        <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><b class="fa fa-check">&nbsp;</b>Database Backup Successfully!</strong>
        </div>
        <?php
}else if(isset($_POST['year1'])) {
    $yr = mysqli_real_escape_string($db,$_POST['yr1']);
    $sql = $oop->upYear($yr);
    if (!$sql) {
        ?>
        <div class="alert alert-warning alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><b class="fa fa-check">&nbsp;</b>Failed to update year to display!</strong>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong><b class="fa fa-check">&nbsp;</b>Successfully year to display updated!</strong>
        </div>
        <?php
    }
}
?>
            </div>
        </div>        
        <div class="row">
            <div class="col-sm-4">
            <form method="POST" action="">
              <div class="input-group">
                <span class="input-group-addon">Current Year To Display</span>
                <select name="yr1" class="form-control" id='yr'>
                        <?php
                        $result =mysqli_query($db, "SELECT Year FROM tbl_monthly_sales_report GROUP BY Year");
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                          echo"<option value=".$row['Year']."> ";
                          echo $row['Year'];
                          echo"</option>";
                          // echo "<option>";
                          // echo 2018;
                          // echo "</option>";
                        }
                        ?>
                </select>
                <div class="input-group-btn">
                  <button class="btn btn-primary form-control" name="year1" type="submit">
                    <b class="fa fa-paper-plane fa-lg"></b>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon"><b class="fa fa-database">&nbsp;</b>Backup Database</span>
                        <span class="input-group-btn"><button type="submit" name="backup" class="btn btn-primary">Backup</button></span>
                    </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon">Out of Stocks</span>
                    <select name="os" class="form-control">
                        <option value="">DO NOTHING</option>
                        <option value="">MARK INACTIVE</option>
                    </select>
                    <span class="input-group-btn"><button class="btn btn-primary" type="submit">Submit</button></span>
                </div>
            </div>
            </form>
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
     </div>

    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript">
;(function(){
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
})();
</script>
</body>
</html>