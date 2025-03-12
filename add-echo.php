<?php

    session_start();

    include 'config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
    }
    else if(isset($_POST['submit']))
    {
        $user = $_POST['user'];
            $orderdate = $_POST['orderdate'];
            $orderno = $_POST['orderno'];
            $ipno = $_POST['ipno'];
            $bedno = $_POST['bedno'];

            $one = $_POST['one'];
            $two = $_POST['two'];
            $three = $_POST['three'];
            $four = $_POST['four'];
            $five = $_POST['five'];
            $six = $_POST['six'];
            $seven = $_POST['seven'];
            $eight = $_POST['eight'];
            
            if(mysqli_query($conn, "insert into echo(patient_id,order_date, Order_No, IPNO, Bed_No, Aortic_root, Left_atrium, IVSd, LVPWd, LVIDd, LVIDs, LVEF, Impression)values('$user', '$orderdate', '$orderno', '$ipno', '$bedno', '$one', '$two', '$three', '$four', '$five', '$six', '$seven', '$eight')"))
            {
                echo "<script>alert('ECGHO added successfully..!');</script>";
            }
            else
            {
                // echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
                echo mysqli_error($conn);
            }                  
    }

    include 'link.php';
    include 'sidebar.php';
?>

<!-- Page Content Holder -->
<div id="content">
<?php
    include 'header.php';
?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style="padding: 30px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top:10px">
        <div class="login">
            <h3 class="inner-tittle t-inner">ECHO COLOR DOPPLER</h3>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-5 mt-4">
                        <label for="username">Select User</label>
                        <div class="input-group">	
                        <select class="form-control" aria-label="Default select example" required name="user">
                            <option value="">Select User</option>
                            <?php 
                                $res = mysqli_query($conn, "select id , UHID, full_name from patient_master");
                                while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['UHID']." (".$row['full_name'].")";?></option>
                                    <?php
                                }?>
                        </select>
                        </div>
                    </div>
                </div>  

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="username">Order Date</label>
                        <div class="input-group">	
                            <input type="date" name="orderdate" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="username">Order Number</label>
                        <div class="input-group">	
                            <input type="text" name="orderno" min="1" class="form-control" required/>
                        </div>
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="username">IPNO Number</label>
                        <div class="input-group">	
                            <input type="text" name="ipno" min="1" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="username">BED Number</label>
                        <div class="input-group">	
                            <input type="text" name="bedno" min="1" class="form-control" required/>
                        </div>
                    </div>
                </div> 

                <div class="form-group row mt-4">
                    <div class="col-md-4">
                        <strong for="username">Parameter</strong>
                    </div>
                    <div class="col-md-4">
                    <strong for="username">Values</strong>
                    </div>
                    <div class="col-md-4">
                        <strong for="username">Normal Values</strong>
                    </div>
                </div>  
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">Aortic Root</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="one">
                    </div>
                    <div class="col-md-3">
                        <label for="username">20-37 mm</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">Left Atrium</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="two">
                    </div>
                    <div class="col-md-3">
                        <label for="username">19-35 mm</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">IVSd</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="three">
                    </div>
                    <div class="col-md-3">
                        <label for="username">6-11 mm</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">LVPWd</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="four">
                    </div>
                    <div class="col-md-3">
                        <label for="username">6-11 mm</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">LVIDd</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="five">
                    </div>
                    <div class="col-md-3">
                        <label for="username">34-52 mm</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">LVIDs</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="six">
                    </div>
                    <div class="col-md-3">
                        <label for="username">23-33 mm</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">LVEF</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control icon" style="padding-left:18px" required name="seven">
                    </div>
                    <div class="col-md-3">
                        <label for="username">50-90%</label>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="username">Impression</label>
                    </div>
                    <div class="col-md-5">
                    <textarea name="eight" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="username"></label>
                    </div>
                </div>

                <div class="submit"><button type="submit" class="btn btn-primary error-w3l-btn w-100 mt-3" name="submit">Submit</button></div>
                <div class="clearfix"></div>
            </form>
        </div>  
    </div>
    <div class="col-lg-2"></div>
</div>

<?php
    include 'footer.php';
?>
        