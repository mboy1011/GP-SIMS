
<!DOCTYPE html>
<html>
<head>
  <title>Golden Pharmaceutical</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>    
<div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
      <div>
        <p class="com">GOLDEN PHARMACEUTICAL</p>
        <p class="sys">Sales and Inventory Management System</p>
      </div>  
      <hr>
    </div>
    <div class="col-sm-4">
      
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
      <form action="" method="POST">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><li class="fa fa-id-badge fa-lg"></li></span>
          <input type="text" name="username" class="form-control" placeholder="Username" required=""> 
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><li class="fa fa-key fa-sm"></li></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required=""> 
        </div>  
        <button class="btn btn-primary form-control" type="submit"><li class="fa fa-sign-in fa-lg"></li>&nbsp;&nbsp;Login</button>
      </form>
    </div>
    <div class="col-sm-4">

    </div>    
</div>
<div class="row">
  <div class="col-sm-4">
    
  </div>
  <div class="col-sm-4">
<?php
include 'php/config.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
        $user = mysqli_real_escape_string($db,$_POST['username']);
        $pass = mysqli_real_escape_string($db,$_POST['password']);
        $sql = mysqli_query($db, "SELECT * FROM tbl_useraccounts WHERE lname='$user' AND password='$pass'");
        $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        if ($row['lname']==$user) {
          if ($row['password']==$pass) {
            session_start();
            $_SESSION['login_user']=$user;
            header('location:php/index.php'); 
          }else{
          ?>
              <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Invalid Password!</strong> Try Again.
              </div>
          <?php
          }
        }else{
          ?>
              <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Invalid Username and Password</strong> Try Again.
              </div>
          <?php
        } 
}
?>    
  </div>
  <div class="col-sm-4">
    
  </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>