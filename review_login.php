<?php
    include "service/database.php";

    session_start();

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
    <title>SwiftVerse</title>
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <section class="review" id="review">
        <div class="review-text">
            <h1>Swifties said...</h1>
            <p>Maaf, kamu tidak dapat mengakses konten ini swifties :( <br> Kamu perlu login terlebih dahulu untuk bisa dapat melakukan review ^^</p>
            <a href="register.php" class="btn">Daftar</a>
            <a href="login.php" class="btn">Masuk</a>
        </div>

    </section>

    <!--JavaScript-->
    <script src="main.js"></script>
</body>

</html>

