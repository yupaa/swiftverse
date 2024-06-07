<?php

    include "service/database.php";
    session_start();

    $login_message="";

   

    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_pw = hash("md5",$password);

        $sql = "SELECT * FROM user WHERE username='$username' 
        AND password='$hash_pw'";

        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_Login"] = true;
            
            header("location: dashboard.php");
        }
        else{
            $login_message = "akun tidak ditemukan";
        }
        $db->close();
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Taylor, Swift, songs">
    <meta name="description" content="Taylor Swift fanpage">
    <meta name="author" content="Aulia Zulfa">
    <title>Login</title>
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="logregstyle.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <form action="login.php" method="POST" class="login">
            <p class="login-register-title">LOG IN</p>
            <div class="input-group"><input type="text" placeholder="Username" name="username" required></div>
            <div class="input-group"><input type="password" placeholder="Password" name="password" required></div>
            <div class="input-group"><input type="submit" value="Masuk" class="btn" name="btn_login"></div>
            <p class="login-register-text">Belum punya akun? <a href="register.php">Daftar</a></p>
            <i><?= $login_message ?></i>
        </a<>
    </div>

    <!--JavaScript-->
    <script src="main.js"></script>
</body>

</html>