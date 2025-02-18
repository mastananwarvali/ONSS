<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);
 
$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();
 
if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

            
    background-image:
        radial-gradient(at 61% 4%, hsla(303, 91%, 61%, 1) 0px, transparent 50%),
        radial-gradient(at 75% 66%, hsla(196, 91%, 79%, 1) 0px, transparent 50%),
        radial-gradient(at 98% 88%, hsla(76, 87%, 78%, 1) 0px, transparent 50%),
        radial-gradient(at 23% 16%, hsla(238, 96%, 77%, 1) 0px, transparent 50%),
        radial-gradient(at 95% 65%, hsla(13, 91%, 75%, 1) 0px, transparent 50%),
        radial-gradient(at 10% 79%, hsla(228, 96%, 69%, 1) 0px, transparent 50%),
        radial-gradient(at 85% 58%, hsla(328, 81%, 68%, 1) 0px, transparent 50%);
 
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            height: 500px; /* Increase the height as needed */
            max-width: 90%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        img {
            width: 100px;
            height: 100px;
            margin-top: 0px; /* Adjust as needed */
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <form method="post" action="process-reset-password.php">

        <img src="login.png" alt="Image" id="resetPasswordLogo">

        <h1>Reset Password</h1>

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">New password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button>Send</button>
    </form>
</body>
</html>
 