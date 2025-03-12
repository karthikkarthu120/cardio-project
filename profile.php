<?php
    session_start();
    $id = $_SESSION['id'];
    include 'config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
    }
    else if(isset($_POST['change']))
    {
        if(!empty($_FILES['image']['name']))
        {

            $image = "user/".$_FILES["image"]["name"];
            if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"]))
            {

                $fname = $_POST['fname'];
                $email = $_POST['email'];
                $num = $_POST['contact'];
                
                if($_SESSION['type']=='Admin') {
                    if(mysqli_query($conn, "update user set full_name = '$fname', email = '$email', image = '$image', contact = '$num' where id = '$id'"))
                    {     
                        echo "<script>alert('Profile updated successfully..!');location.href='profile.php'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Unable to update profile..!');</script>";
                    }
                }   
                else if($_SESSION['type']=='Doctor') {
                    $qualification = $_POST['qualification'];
                    $address = $_POST['address'];

                    if(mysqli_query($conn, "update user set full_name = '$fname', email = '$email', image = '$image', contact = '$num', address = '$address', qualification = '$qualification' where id = '$id'"))
                    {     
                        echo "<script>alert('Profile updated successfully..!');location.href='profile.php'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Unable to update profile..!');</script>";
                    }
                }
                else if($_SESSION['type']=='User') {
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $age = $_POST['age'];
                    $injuries = $_POST['injuries'];

                    if(mysqli_query($conn, "update user set full_name = '$fname', email = '$email', contact = '$num', address = '$address', gender = '$gender', age = '$age', injuries = '$injuries' where id = '$id'"))
                    {     
                        echo "<script>alert('Profile updated successfully..!');location.href='profile.php'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Unable to update profile..!');</script>";
                    }
                }
            }
            else
            {
                echo "<script>alert('Unable to upload your image on server..!');</script>";
            } 
        }
        else
        {
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $num = $_POST['contact'];
            
            if($_SESSION['type']=='Admin') {
                if(mysqli_query($conn, "update user set full_name = '$fname', email = '$email', contact = '$num' where id = '$id'"))
                {     
                    echo "<script>alert('Profile updated successfully..!');location.href='profile.php'</script>";
                }
                else
                {
                    echo "<script>alert('Unable to update profile..!');</script>";
                }
            }   
            else if($_SESSION['type']=='Doctor') {
                $qualification = $_POST['qualification'];
                $address = $_POST['address'];

                if(mysqli_query($conn, "update user set full_name = '$fname', email = '$email', contact = '$num', address = '$address', qualification = '$qualification' where id = '$id'"))
                {     
                    echo "<script>alert('Profile updated successfully..!');location.href='profile.php'</script>";
                }
                else
                {
                    echo "<script>alert('Unable to update profile..!');</script>";
                }
            }
            else if($_SESSION['type']=='User') {
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $age = $_POST['age'];
                $injuries = $_POST['injuries'];

                if(mysqli_query($conn, "update user set full_name = '$fname', email = '$email', contact = '$num', address = '$address', gender = '$gender', age = '$age', injuries = '$injuries' where id = '$id'"))
                {     
                    echo "<script>alert('Profile updated successfully..!');location.href='profile.php'</script>";
                }
                else
                {
                    echo "<script>alert('Unable to update profile..!');</script>";
                }
            }
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
    <div class="col-lg-3"></div>
    <div class="col-lg-6" style="padding: 30px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top:10px">
        <div class="login">
            <h3 class="inner-tittle t-inner">Profile Update</h3>
            <form method="post" action="#" enctype="multipart/form-data">
                <?php
                $res = mysqli_query($conn,"select * from user where id = '$id'");
                $row=mysqli_fetch_assoc($res);?>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" disabled class="form-control icon mt-4" value="<?php echo $row['username'];?>"  placeholder="Designation" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

            <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">	
                            <input type="text" class="form-control icon" name="fname" value="<?php echo $row['full_name'];?>" placeholder="First Name" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">	
                            <input type="email" class="form-control icon" name="email" value="<?php echo $row['email'];?>" placeholder="Email Address" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">	
                            <input type="text" title="Please enter 10 digit valid number" value="<?php echo $row['contact'];?>" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" placeholder="Contact Number" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <?php
                    if($_SESSION['type']=='User')
                    {?>
                        <div class="form-group">
                            <div class="col-sm-12"><textarea name="address" cols="50" rows="5" class="form-control" placeholder="Address" style="height: 75px;" required><?php echo $row['address'];?></textarea></div>
                        </div>
                        <label class="form-check-label ml-3" for="flexRadioDefault1">Gender</label>
                        <div class="form-check ml-3">
                            <input class="form-check-input" required type="radio" name="gender" value="Male" id="flexRadioDefault2" <?php if($row['gender']=='Male'){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Male
                            </label>
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault1" <?php if($row['gender']=='Female'){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Female
                            </label>
                        </div>

                        <label class="form-check-label ml-3 mt-3" for="flexRadioDefault1">Injuries</label>
                        <div class="form-check ml-3">
                            <input class="form-check-input" required type="radio" name="injuries" value="Yes" id="flexRadioDefault2" <?php if($row['injuries']=='Yes'){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Yes
                            </label>
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="injuries" value="No" id="flexRadioDefault1" <?php if($row['injuries']=='No'){echo 'checked';}?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                No
                            </label>
                        </div>

                        <div class="form-group mt-2">
                            <div class="col-md-12">
                                <div class="input-group">	
                                    <input type="text" title="Please enter age" value="<?php echo $row['age'];?>" class="form-control icon" name="age" placeholder="Age" style="padding-left:18px" required>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else if($_SESSION['type']=='Doctor')
                    {?>
                        <div class="form-group">
                            <div class="col-sm-12"><textarea name="address" cols="50" rows="5" class="form-control" placeholder="Address" style="height: 75px;" required><?php echo $row['address'];?></textarea></div>
                        </div>

                        <div class="form-group mt-2">
                            <div class="col-md-12">
                                <div class="input-group">	
                                    <input type="text"  value="<?php echo $row['qualification'];?>" class="form-control icon" name="qualification" placeholder="Qualification" style="padding-left:18px" required>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                ?>

                <div class="form-group col-md-12">
                    <label for="validationDefault02" class="input__label">Profile Image</label>
                    <input type="file" class="form-control input-style" style="padding-bottom:30px" id="validatedCustomFile" name="image" accept="image/*">
                </div>

                <div class="submit"><button type="submit" class="btn btn-primary error-w3l-btn w-100 mt-3" name="change">Submit</button></div>
                <div class="clearfix"></div>
            </form>
        </div>  
    </div>
    <div class="col-lg-3"></div>
</div>

<?php
    include 'footer.php';
?>
        