<?php
include 'config.php';
include 'crud.php';
$oop = new CRUD();
            if ($_REQUEST['addpay']) {
                $cusid = mysqli_real_escape_string($db,$_POST['cu']);
                $sino = mysqli_real_escape_string($db,$_POST['si']);
                $ptype = mysqli_real_escape_string($db,$_POST['pa']);
                $am = mysqli_real_escape_string($db,$_POST['am']);
                $ta = mysqli_real_escape_string($db,$_POST['to']);
                $sql = mysqli_query($db,"SELECT * FROM tbl_payments WHERE sales_no=$sino AND cus_id=$cusid");
                $row = mysqli_fetch_assoc($sql);
                $paymentid = $row['pay_id'];
                $bal = $row['balance'];
                if ($row>0) {
                  $total = (float)$bal - (float)$am;
                  $update = mysqli_query($db,"UPDATE tbl_payments SET sales_no='$sino',cus_id='$cusid',amount='$am',balance='$total' WHERE sales_no='$sino' AND cus_id='$cusid'");        
                  if (!$update) {
                      // header("Content-type: application/json");
                      // $_data['status_code'] = 0;
                      // $_data['status_msg'] = "Failed to add payments";
                      // echo json_encode($_data);
?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Failed to Add Payments!</strong>Try Again.
                      </div>
<?php
                  }else{
                      $insert = mysqli_query($db,"INSERT INTO tbl_paymentsdetails(pay_id,pay_type,amount) VALUES('".$paymentid."','".$ptype."','".$am."')");
                      if (!$insert) {
                           // header("Content-type: application/json");
                           // $_data['status_code'] = 0;
                           // $_data['status_msg'] = "Failed to add payments";
                           // echo json_encode($_data);
?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Failed to Add Payments!</strong>Try Again.
                      </div>
<?php                        
                      }else{
                        $oop->upStat($total,$sino);
                        //  header("Content-type: application/json");
                        // $_data['status_code'] = 1;
                        // $_data['status_msg'] = "Successfully Added!";
                        // echo json_encode($_data);
?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Successfully Added Payments!</strong>
                      </div>
<?php                        
                      }
                  }
                }else{
                  $total = $ta - $am;
                  $insert1a = mysqli_query($db,"INSERT INTO tbl_payments(sales_no,cus_id,pay_type,amount,balance) VALUES ('".$sino."','".$cusid."','".$ptype."','".$am."','".$total."')");
                  if (!$insert1a) {
                      //  header("Content-type: application/json");
                      // $_data['status_code'] = 0;
                      // $_data['status_msg'] = "Failed to add payments to customer";
                      // echo json_encode($_data);
?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Failed to Add Payments!</strong>Try Again.
                      </div>
<?php
                  }else{
                      $select1 = mysqli_query($db,"SELECT pay_id FROM tbl_payments WHERE sales_no='$sino' AND cus_id='$cusid'");
                      $rows = mysqli_fetch_assoc($select1);
                      $payid = $rows['pay_id'];
                      $sqli = mysqli_query($db,"INSERT INTO tbl_paymentsdetails(pay_id,pay_type,amount) VALUES('".$payid."','".$ptype."','".$am."')");
                      if ($sqli) {
                        $oop->upStat($total,$sino);
                         // header("Content-type: application/json");
                         // $_data['status_code'] = 1;
                         // $_data['status_msg'] = "Success!";
                         // echo json_encode($_data);
?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Successfully Added Payments!</strong>
                      </div>
<?php                                                
                      }
                  }
                }
            }
?>        