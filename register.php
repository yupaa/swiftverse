<?php
    include "service/database.php";

    $register_message="";

    if(isset($_POST['btn_regist'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = $_POST['birth'];
        $hash_pw = hash("md5",$password);

        try{
            $sql = "INSERT INTO user(username, email, password, dob) 
            VALUES('$username','$email','$hash_pw','$dob')";

            if($db->query($sql)){
            header("location: login.php");
            }else{
            $register_message="daftar akun gagal";
            }

        }catch(mysqli_sql_exception){
            $register_message="username atau email sudah digunakan!";
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
    <title>Register</title>
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="logregstyle.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <form id="registrationForm" action="register.php" method="POST" class="login">
            <p class="login-register-title">REGISTER</p>
            <div class="input-group"><input type="text" placeholder="Username" name="username" required></div>
            <div class="input-group"><input type="date" placeholder="Birthdate" name="birth" required></div>
            <div class="input-group"><input type="email" placeholder="Email" name="email" id="email" required></div>
            <span id="emailError" class="error"></span> 
            <div class="input-group"><input type="password" placeholder="Password" name="password" id="password" required></div>
            <span id="passwordError" class="error"></span> 
            <div class="input-group"><input type="submit" value="Daftar" class="btn" name="btn_regist"></div>
            <p class="login-register-text">Sudah punya akun? <a href="login.php">Login</a></p>
            <i><?= $register_message ?></i>
        </form>
    </div>
    





 <!--   <div class="container">
        <form action="" method="POST" class="login">
            <p class="login-register-title">REGISTER</p>
            <div class="input-group"><input type="text" placeholder="Username" name="username"></div>
            <div class="input-group"><input type="date" placeholder="Birthdate" name="birth"></div>
            <div class="input-group"><input type="text" placeholder="Email" name="email"></div>
            <div class="input-group"><input type="password" placeholder="Password" name="password"></div>
            <div class="input-group"><input type="password" placeholder="Konfirmasi Password" name="conpassword"></div>
            
            <p class="login-register-text">Sudah punya akun? <a href="login.html">Login</a></p>
        </a<>

    </div> -->

    
    <!--JavaScript-->
    <script src="main.js"></script>
</body>

</html>