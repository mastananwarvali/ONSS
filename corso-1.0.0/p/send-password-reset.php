<?php

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if ($email === false) {
    die("Invalid email format");
}
$name1="khv";

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$stmt1 = $mysqli->prepare("SELECT name FROM users WHERE email = ?");
$stmt1->bind_param("s", $email);
$stmt1->execute();
$stmt1->bind_result($name);

// Fetch the result
if ($stmt1->fetch()) {
    $name1=$name;
    // Name is fetched, you can use it as needed
    // Close the result set before preparing the next query
    $stmt1->close();
}

$sql = "UPDATE users
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Error in query preparation: " . $mysqli->error);
}

$stmt->bind_param("sss", $token_hash, $expiry, $email);

if (!$stmt->execute()) {
    die("Error in query execution: " . $stmt->error);
}

if ($mysqli->affected_rows) {
    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Reset Your Password Here";
    // $mail->Body = <<<END
    //     Click <a href="http://localhost/p/reset-password.php?token=$token">here</a> 
    //     to reset your password.
    // END;
    $mail->Body = <<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                padding: 20px;
            }
            .email-verification {
                max-width: 400px;
                margin: 0 auto;
                background-color: #ffffff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: #ffffff;
                text-decoration: none;
                border-radius: 4px;
                margin-left: 28%;
            }
            .footer {
                font-size: 12px;
                color: #888888;
                text-align: center;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="email-verification">
            <h2>Hearty Welcome ....!! <?php echo $name1; ?></h2>
            <p>Thanks for using Online Notes Sharing!</p>
    
            <p>Click the button below to reset your password:</p>
            
            <p><a href="http://localhost/online-notes-sharing/corso-1.0.0/p/reset-password.php?token=$token" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 4px; margin-left: 28%;">Reset Password</a></p>

            <p>If you encounter any issues, contact our support team or reach out to us on <a href="aboutus.php">@support</a>.</p>  
            <h6>From developers</h6>      
        </div>
    
        <div class="footer">
            © 2024 Online notes sharing system developers.
        </div>
    </body>
    </html>
END;


try {
    $mail->send();
    echo '<script>alert("Message sent, please check your inbox."); window.location = "../login.php";</script>';
} catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Mailer error: '.$mail->ErrorInfo.'"); window.location = "../login.php";</script>';
} 
} else {
echo '<script>alert("Email not found in the database"); window.location = "../login.php";</script>';
}

$stmt->close();
$mysqli->close();
?>
<!-- <p><a href="http://localhost/p/reset-password.php?token=$token" class="button">Reset Password</a></p> -->

