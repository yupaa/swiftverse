<?php
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['username']!='admin' ){
        header ("location: dashboard.php");
    }
    include "service/database.php";

    $message="";

    if(isset($_POST['btn_song'])){
        $title = $_POST['title'];
        $year = $_POST['ryear'];
        $mood = $_POST['desc'];

            $sql = "INSERT INTO song(title, year, mood) 
            VALUES('$title','$year','$mood')";

            if($db->query($sql)){
            header("location: dashboard.php");
            }else{
            $message="penambahan lagu gagal";
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
    <title>Tambah Lagu</title>
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="logregstyle.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <form id="addSongForm" action="add_song.php" method="POST" class="login">
            <p class="login-register-title">TAMBAHKAN LAGU</p>
            <div class="input-group"><input type="text" placeholder="Judul Lagu" name="title" required></div>
            <div class="input-group"><input type="number" min="2021" max="2024" step="1" placeholder="Tahun Rilis" name="ryear" required></div>
            <div class="input-group"><input type="text" placeholder="Deskripsi Singkat" name="desc" required></div>

            <div class="input-group"><input type="submit" value="Tambahkan" class="btn" name="btn_song"></div>
        </form>
    </div>
    


    
    <!--JavaScript-->
    <script src="main.js"></script>
</body>

</html>