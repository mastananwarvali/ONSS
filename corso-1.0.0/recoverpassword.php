<?php include 'includes/connection.php';?>


<?php
if (isset($_POST['recover'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$query = "SELECT email FROM users WHERE email = '$email'";
$run = mysqli_query($conn , $query) or die (mysqli_error($conn) );
if (mysqli_num_rows($run) > 0) {
	function generateRandomString($length = 5) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
 
$token_tmp = generateRandomString();
$token = md5($token_tmp);
$url = $_SERVER['REQUEST_URI'];
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
} 
require 'PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'srinivas.21mis7009@vitapstuent.ac.in';          // SMTP username
$mail->Password = 'dxpyuccxouaydxag'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('srinivas.21mis7009@vitapstuent.ac.in', 'Admin');
$mail->addReplyTo('srinivas.21mis7009@vitapstuent.ac.in', 'Admin');
$mail->addAddress($email);

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Recover Password Link: </h1>';
$bodyContent .= 'http://' . $dir . 'verifytoken.php?token='.$token;

$mail->Subject = 'Email from collegenotesgallery ';
$mail->Body    = $bodyContent;


$query2 = "UPDATE users set token = '$token' WHERE email = '$email'";
$run = mysqli_query($conn , $query2) or die(mysqli_error($conn));
$count = mysqli_affected_rows($conn);
if($mail->send() && ($count > 0)) {
	echo "<center> <font color = 'green' >Email with recover password link has been sent </font><center> " ;
} else {

    echo  "<center> <font color = 'red' >'Message could not be sent.'</font><center> ";
    echo  "<center> <font color = 'red' >'Mailer Error: ' . $mail->ErrorInfo </font><center> ";
}
}
else {
	echo "<center> <font color = 'red' > Entered email does not match to any record </font><center> ";
}
}
else {
	echo "<center> <font color = 'red' > Invalid email type </font><center> ";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Recovery</title>
<style>
 body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-card {
        width: 350px;
        padding: 40px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .login-card h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }
    .login-card input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }
    .login-card input[type="submit"] {
        width: 100%;
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }
    .login-card input[type="submit"]:hover {
        background-color: #2980b9;
    }
    .login-help {
        text-align: center;
        margin-top: 15px;
    }
    .login-help a {
        color: #333;
        text-decoration: none;
    }
</style>
</head>


 <div class="login-card">
    <h1>Recover Password</h1><br>
  <form action = "" method="POST">
    <input type="text" name="email" placeholder="Enter your Email" required="">
     <input type="submit" name="recover" class="login login-submit" value="send">
  </form>
    
  <div class="login-help">
    <a href="signup.php">Register</a> • <a href="login.php">Login</a>
  </div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  
</body>
</html>
 
