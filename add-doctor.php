<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

    session_start();

    include 'config.php';

    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
    }
    else if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $specialization = $_POST['specialization'];
        $qualification = $_POST['qualification'];
        $num = $_POST['contact'];
        $pass = "PAss".rand(100000,999999);
        if(mysqli_query($conn, "insert into doctor_master(full_name,email, phone, username, doctor_status, image, specialization, qualification)values('$name','$email', '$num', '$username', true, 'user/doctor_image.jpg', '$specialization', '$qualification')"))
        {
          if(mysqli_query($conn, "insert into user_master(username, type, password, status)values('$username','Doctor','$pass',true)")){
            $appname = "Cardiology";

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
                  $mail->Subject = "User Registration : ".$appname;
                  $mail->Body = 'Dear '.$name.'<br> You have recently registered to our webpage.<br> USER NAME : '.$username.'<br>Password: '.$pass.'<br><br> Thank you<br>Team '.$appname;
                  $mail->AltBody = 'User Registration Email';

                  $mail->send();
                  // echo "Email message sent.";
                  
                  echo "<script>alert('User registered successfully..!');location.href='view-doctor.php'</script>";
                } 
                catch (Exception $e) 
                {
                    // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                    echo "<script>alert('User registered successfully..!');</script>";

                }
          }
          else{
            echo "<script>alert('Unable to process, Kindly try after sometimes..')</script>";
            // echo mysqli_error($conn);
          }
        }
        else
        {
            echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
           
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
            <h3 class="inner-tittle t-inner">Add Doctor</h3>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12 mt-4">
                        <label for="username">User Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control icon" style="padding-left:18px" required name="username">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="username">Full Name</label>
                        <div class="input-group">	
                            <input type="text" class="form-control icon" name="name" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                    <label for="username">Email Address</label>
                        <div class="input-group">	
                            <input type="email" class="form-control icon" name="email" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="username">Contact Number</label>
                        <div class="input-group">	
                            <input type="text" title="Please enter 10 digit valid number" pattern="[6789][0-9]{9}" class="form-control icon" name="contact" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                    <label for="username">Qualification</label>
                        <div class="input-group">	
                            <input type="text" class="form-control icon" name="qualification" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                    <label for="username">Specialization</label>
                        <div class="input-group">	
                            <input type="text" class="form-control icon" name="specialization" style="padding-left:18px" required>
                        </div>
                    </div>
                </div>

                <div class="submit"><button type="submit" class="btn btn-primary error-w3l-btn w-100 mt-3" name="submit">Submit</button></div>
                <div class="clearfix"></div>
            </form>
        </div>  
    </div>
    <div class="col-lg-3"></div>
</div>

<?php
    include 'footer.php';
?>
        