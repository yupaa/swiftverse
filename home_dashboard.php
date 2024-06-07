<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("location: index.php");
        exit();
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
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <section class="home" id="home">
        <div class="home-text">
            <h4>Hi, <?= $_SESSION["username"]?><br></h4>
            <h2>Jelajahi Lebih Dalam <br> Tentang Idolamu</h2>
            <p><br>Temukan rekomendasi lagu dan berikan ulasanmu <br><br></p>
            <a href="logout.php" class="btn">Keluar</a>
            
        </div>
        <div class="home-img">
            <img src="src/swift.png" alt="Taylor Swift">
        </div>

    </section>


    <!--JavaScript-->
    <script src="main.js"></script>
</body>

</html>