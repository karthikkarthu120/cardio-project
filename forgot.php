<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
  require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
  require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

  $mail = new PHPMailer(true);

  include 'config.php';
  session_start();
  if(isset($_SESSION['login']))
  {
      header ("Location: index.php");
  }
  else
  {
      if(isset($_POST['submit']))
      {
        $username = $_POST['username'];

        $res = mysqli_query($conn, "select type, password from user_master where username = '$username'");
        if(mysqli_num_rows($res)>0)
        {
          $row = mysqli_fetch_assoc($res);
          $sql = "";
          $password = $row['password'];
          $appname = "Cardiology";

          if($row['type']=='Patient'){
            $sql = "select * from patient_master where username = '$username'";
          }
          else if($row['type']=='Doctor'){
            $sql = "select * from doctor_master where username = '$username'";
          }
          else if($row['type']=='Admin'){
            $sql = "select * from admin_master where username = '$username'";
          }
          else{
            echo "<script>alert('Unable to process your request..!');</script>";
          }

          $res1 = mysqli_query($conn, $sql);
          if(mysqli_num_rows($res1)>0){
            $row1 = mysqli_fetch_assoc($res1);
            $name = $row1['full_name'];
            $email = $row1['email'];

            try 
            {
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port = 587;

              $mail->Username = 'project.head1994@gmail.com'; // YOUR gmail email
              $mail->Password = 'MAnoj143'; // YOUR gmail password

              // Sender and recipient settings
              $mail->setFrom('project.head1994@gmail.com', $appname);
              $mail->addAddress($email, $name);
              $mail->addReplyTo('project.head1994@gmail.com', $appname); // to set the reply to

              // Setting the email content
              $mail->IsHTML(true);
              $mail->Subject = "Forgot Password : ".$appname;
              $mail->Body = 'Dear '.$name.'<br> You recently requested reset your password<br> Password : '.$password.'<br><br> Thank you<br>Team '.$appname;
              $mail->AltBody = 'Forgot password reset email';

              $mail->send();
              // echo "Email message sent.";
              
              echo "<script>alert('Password has been sent to your registered email..!');location.href='login.php'</script>";
            } 
            catch (Exception $e) 
            {
                // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                echo "<script>alert('Unable to process your request..!');</script>";

            }
          }
          else{
            echo "<script>alert('Unable to process your request..!');</script>";
          }
        }
        else
        {
          echo "<script>alert('Invalid data you provided..!');</script>";
        }

      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot - Page</title>
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
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Forgot Password</h2>
            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-50 mx-auto mt-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control icon" name="username" placeholder="User Name" style="padding-left:18px" required>
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn w-100" name="submit">Submit</button>
                </form>
                <p class="paragraph-agileits-w3layouts mt-4">Remember your password?
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