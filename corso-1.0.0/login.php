<?php
include 'includes/connection.php';


session_start();

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $captcha = $_POST['r'];

    // Validate captcha
    if ($captcha !== $_SESSION['captcha']) {
        echo "<script>alert('Invalid captcha code');</script>";
        echo "<script>window.location.href= 'login.php';</script>";
        exit; // Exit the script if captcha is invalid
    }

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $user = $row['username'];
        $pass = $row['password'];
        $name = $row['name'];
        $email = $row['email'];
        $role = $row['role'];
        $course = $row['course'];

        if (password_verify($password, $pass)) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['course'] = $course;
            header('location: dashboard/');
            exit; // Exit after redirect
        } else {
            echo "<script>alert('Invalid username/password');</script>";
        }
    } else {
        echo "<script>alert('Invalid username/password');</script>";
    }
}

// Function to generate captcha code
function captcha_code($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Generate captcha code and store it in session
$_SESSION['captcha'] = captcha_code(6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            width: 700px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slide-in 0.5s ease forwards;
        }

        @keyframes slide-in {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .login-card h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-card form input[type="text"],
        .login-card form input[type="password"],
        .login-card form input[type="submit"] {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .login-card form input[type="text"]:focus,
        .login-card form input[type="password"]:focus,
        .login-card form input[type="submit"]:hover {
            border-color: #3498db;
        }

        .login-card form input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .login-card form input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .login-help {
            text-align: center;
            margin-top: 15px;
        }

        .login-help a {
            color: #3498db;
            text-decoration: none;
        }

        .login-help a:hover {
            text-decoration: underline;
        }

        #op {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        #op:hover {
            background-color: #2980b9;
        }

        .captcha-label {
            display: block;
            margin-bottom: 5px;
        }
        body,
ol,
ul,
h1,
h2,
h3,
h4,
h5,
h6,
p,
th,
td,
dl,
dd,
form,
fieldset,
legend,
input,
textarea,
i,
select {
    margin: 0;
    padding: 0;
}

body {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    background-color: black;
    -webkit-perspective: 90rem;
            perspective: 90rem;
    -webkit-perspective-origin: 34% 61%;
            perspective-origin: 34% 61%;
            
}

img {
    width: 160px;
}

button {
    cursor: pointer;
    outline: 0;
    width: 180px;
    height: 48px;
    border-radius: 8px;
    background-color: #2C3138;
    margin-top: 40px;
    overflow: hidden;
    -webkit-transform: scale(.7);
            transform: scale(.7);
}

button::after {
    content: "";
    position: relative;
    top: -40px;
    display: block;
    width: 48px;
    height: 107%;
    background-color: #000;
    margin-top: -1px;
    margin-left: -7px;
    border-radius: 6px 0 0 6px;
    background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTRweCIgaGVpZ2h0PSIxN3B4IiB2aWV3Qm94PSIwIDAgMTQgMTciIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDUxLjEgKDU3NTAxKSAtIGh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaCAtLT4KICAgIDx0aXRsZT5TaGFwZTwvdGl0bGU+CiAgICA8ZGVzYz5DcmVhdGVkIHdpdGggU2tldGNoLjwvZGVzYz4KICAgIDxkZWZzPjwvZGVmcz4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJEZXNrdG9wLUhELUNvcHktMyIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTYwOS4wMDAwMDAsIC0xMDA4LjAwMDAwMCkiIGZpbGw9IiNGOUZDRkYiIGZpbGwtcnVsZT0ibm9uemVybyI+CiAgICAgICAgICAgIDxnIGlkPSJHcm91cC0xMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNTQ3LjAwMDAwMCwgNDk5LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgPGcgaWQ9Ikdyb3VwLTYtQ29weSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDYuMDAwMDAwLCA0OTUuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICAgICAgPGcgaWQ9ImljX2ZpbGVfZG93bmxvYWRfYmxhY2tfMjRweC0oMSkiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE2LjAwMDAwMCwgOC4wMDAwMDApIj4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggZD0iTTE0LDEyIEwxMCwxMiBMMTAsNiBMNCw2IEw0LDEyIEwwLDEyIEw3LDE5IEwxNCwxMiBaIE0wLDIxIEwwLDIzIEwxNCwyMyBMMTQsMjEgTDAsMjEgWiIgaWQ9IlNoYXBlIj48L3BhdGg+CiAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=');
    background-repeat: no-repeat;
    background-position: center;
}

button::before {
    content: "";
    display: block;
    width: 48px;
    height: 46px;
    margin-left: -7px;
    margin-top: -1px;
    -webkit-transition: all 200ms cubic-bezier(0.25, 0.75, 0.5, 1.25);
    transition: all 200ms cubic-bezier(0.25, 0.75, 0.5, 1.25);
}

.box-1:hover button::before {
    width: 120%;
    opacity: .8;
    background-color: #00BF9C;
}

.box-2:hover button::before {
    width: 120%;
    opacity: .8;
    background-color: #653EE6;
}

.box-3:hover button::before {
    width: 120%;
    opacity: .8;
    background-color: #008BFF;
}

.box-4:hover button::before {
    width: 120%;
    opacity: .8;
    background-color: #FF6500;
}

.container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -ms-flex-pack: distribute;
        justify-content: space-around;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    width: 80vw;
    height: 100vh;
    margin-left: 6vw;
    /* transform:rotateX(7deg) rotateZ(-4deg) rotateY(13deg) scale3d(1, 1, -0.9); */
    -webkit-transform: rotateX(23deg) rotateZ(-9deg) rotateY(15deg) scale3d(1, 1, -0.9);
            transform: rotateX(23deg) rotateZ(-9deg) rotateY(15deg) scale3d(1, 1, -0.9);
}

.box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    -webkit-transition: all .3s ease-out;
    transition: all .3s ease-out;
    will-change: transform;
}

.box:hover .cover {
    -webkit-transform: translateY(-14px) scale(1.04);
            transform: translateY(-14px) scale(1.04);
}

.box-1 button {
    border: 1px solid #00BF9C;
    color: #fff;
    font-size: 22px;
    text-align: right;
    padding-right: 20px;
    line-height: 40px;
}

.box-1 button::after {
    content: "";
    background-color: #00BF9C;
    top: -85px
}

.box-2 button {
    border: 1px solid #653EE6;
    color: #fff;
    font-size: 22px;
    text-align: right;
    padding-right: 20px;
    line-height: 40px;
}

.box-2 button::after {
    content: "";
    background-color: #653EE6;
    top: -85px
}

.box-3 button {
    border: 1px solid #008BFF;
    color: #fff;
    font-size: 22px;
    text-align: right;
    padding-right: 20px;
    line-height: 40px;
}

.box-3 button::after {
    content: "";
    background-color: #008BFF;
    top: -85px
}

.box-4 button {
    border: 1px solid #FF6500;
    color: #fff;
    font-size: 22px;
    text-align: right;
    padding-right: 20px;
    line-height: 40px;
}

.box-4 button::after {
    content: "";
    background-color: #FF6500;
    top: -85px
}

.cover {
    -webkit-transition: all 400ms ease-in-out;
    transition: all 400ms ease-in-out;
    will-change: transform;
}

.cover img {
    -webkit-transition: all 260ms ease-in-out;
    transition: all 260ms ease-in-out;
}

.box .cover::after {
    content: "";
    z-index: -99;
    position: absolute;
    top: 20px;
    left: -20px;
    display: block;
    width: 160px;
    height: 214px;
    opacity: 0;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 160px 214px;
    -webkit-filter: blur(24px);
            filter: blur(24px);
    -webkit-transition: all 260ms ease-in-out;
    transition: all 260ms ease-in-out;
    will-change: transform;
    -webkit-transform: scale(.6);
            transform: scale(.6);
}

.box:hover .cover::after {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1);
}

.box-1 .cover::after {
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/945546/3433202-893bc9989a52eba0.png');
}

.box-2 .cover::after {
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/945546/3433202-964edcf0f07211b0.png');
}

.box-3 .cover::after {
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/945546/3433202-2ebb2b6f93add843.png');
}

.box-4 .cover::after {
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/945546/3433202-f79c4cc8de2f84ae.png');
}

.box-1 button div::before {
    content: 'Sensebot';
    position: relative;
    top: -44px;
    left: -4px;
    color: #00BF9C;
    font-size: 21px;
    font-weight: 300;
}

.box-1:hover button div::before {
    color: #fff;
}

.box-2 button div::before {
    content: 'Downloads';
    position: relative;
    top: -44px;
    left: -6px;
    color: rgb(154, 123, 255);
    font-size: 21px; 
    font-weight: 300;
}

.box-2:hover button div::before {
    color: #fff;
}

.box-3 button div::before {
    content: 'Uploads';
    position: relative;
    top: -44px;
    left: 3px;
    color: #008BFF;
    font-size: 21px;
    font-weight: 300;
}

.box-3:hover button div::before {
    color: #fff;
}

.box-4 button div::before {
    content: 'Scanner';
    position: relative;
    top: -44px;
    left: -9px;
    color: #FF6500;
    font-size: 21px;
    font-weight: 300;
}

.box-4:hover button div::before {
    color: #fff;
}

.dr {
position: absolute;
  bottom: 16px; 
  right: 16px;
  width:100px;
}


    </style>
</head>
<body>

<div class="container">
       
        <div class="box box-2">
            <div class="cover"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/945546/3433202-964edcf0f07211b0.png" alt=""></div>
            <button><div></div></button>
        </div>
    </div>

<a href="https://dribbble.com/YancyMin" class="dr-url" target="_blank"><img class="dr" src="https://cdn.dribbble.com/assets/logo-footer-hd-a05db77841b4b27c0bf23ec1378e97c988190dfe7d26e32e1faea7269f9e001b.png" alt=""></a>

<div class="login-card">
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="user" placeholder="Username" required="">
        <input type="password" name="pass" placeholder="Password" required="">
        
        <label for="captcha" class="captcha-label">Captcha:</label>
        <input type="text" name="r" id="captcha" required><br>
        <div id="op"><?php echo $_SESSION['captcha']; ?></div>
        <input type="submit" name="login" class="login login-submit" value="Login">
    </form>

    <div class="login-help">
        <a href="signup.php">Register</a> • <a href="p/forgot-password.php">Forgot Password</a>
    </div>
</div>
<div class="container">
<div class="box box-3">
            <div class="cover"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/945546/3433202-2ebb2b6f93add843.png" alt=""></div>
            <button><div></div></button>
        </div>
        </div>


</body> 
</html>