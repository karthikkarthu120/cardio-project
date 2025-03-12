<?php
    include 'config.php';
    session_start();
    if(isset($_SESSION['login']))
    {
        header ("Location: index.php");
    }
    if(isset($_POST['submit']))
    {
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        if($pass==$cpass)
        {
            $fname = $_POST['fname'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $num = $_POST['contact'];
            
            if(mysqli_query($conn, "insert into user(full_name, email, type, username, password, image, status, contact)values('$fname', '$email', 'User', '$uname', '$pass', 'user/user_image.jpg', true, '$num')"))
            {
                echo "<script>alert('User registered successfully..!');location.href='login.php'</script>";
            }
            else
            {
                echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
               
            }
        }
        else
        {
            echo "<script>alert('Password Mis-Match..')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register - Page</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Register</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-50 mx-auto mt-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control icon" name="fname" placeholder="Full Name" style="padding-left:18px" required>  
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control icon" name="uname"  placeholder="User Name" style="padding-left:18px" required> 
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control icon" name="email" placeholder="Email Address" style="padding-left:18px" required>
                    </div>

                    <div class="form-group">
                        <input type="text" title="Please enter 10 digit valid number" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" placeholder="Contact Number" style="padding-left:18px" required>
                    </div>

                    <div class="form-group">
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control icon" placeholder="Password" style="padding-left:18px" required name="password">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control icon" placeholder="Confirm Password" style="padding-left:18px" required name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div><div class="clearfix"></div>

                    <button type="submit" class="btn btn-primary error-w3l-btn w-100" name="submit">Submit</button>
                </form>
                <p class="paragraph-agileits-w3layouts mt-4">Already have account?
                    <a href="login.php">Login</a>
                </p>
            </div>

        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>