<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM tbl_employee WHERE lname='$user_check'");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $name = $row['lname'].", ".$row['fname']." ".$row['mname'].". ";   
   if(!isset($_SESSION['login_user'])){
      header("location:../index.php");
   }
?>