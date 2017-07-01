                <?php
                    if(isset($_POST['importcustomer'])){
                        
                        //validate whether uploaded file is a csv file
                        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
                        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                                //open uploaded csv file with read only mode
                                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');          
                                //skip first line
                                fgetcsv($csvFile);
                                //parse data from csv file line by line
                                while(($line = fgetcsv($csvFile)) !== FALSE){
                                    //check whether member already exists in database with same email
                                    $sql = mysqli_query($db,"SELECT * FROM tbl_customers WHERE tin = '".$line[1]."'");
                                    $result = mysqli_fetch_assoc($sql);
                                    if($result > 0){
                                        //update member data
                                        $query1 = mysqli_query($db,"UPDATE tbl_customers SET full_name = '".$line[0]."',  terms = '".$line[2]."', opidno = '".$line[3]."', bstyle = '".$line[4]."', address = '".$line[5]."' WHERE tin = '".$line[1]."'");
                                    }else{
                                        //insert member data into database
                                        $query2 = mysqli_query($db,"INSERT INTO tbl_customers (full_name, tin, terms, opidno, bstyle, address) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."')");
                                    }
                                }
                                
                                //close opened csv file
                                fclose($csvFile);

                                $qstring = '?status=succ';                                
                            }else{
                                $qstring = '?status=err';
                            }
                        }else{
                            $qstring = '?status=invalid_file';              
                        }
                    }
?>