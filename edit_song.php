<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Taylor, Swift, songs">
    <meta name="description" content="Taylor Swift fanpage">
    <meta name="author" content="Aulia Zulfa">
    <title>Edit Song</title>
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="logregstyle.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div class="container">
    <?php
    // Ambil data baris yang akan diubah dari parameter URL
    $song_to_edit = $_GET['id'];

    // Koneksi ke database
    $db_hostname = "localhost";
    $db_database = "swiftverse";
    $db_username = "root";
    $db_password = "";
    $db_charset = "utf8mb4";

    try {
        $pdo = new PDO("mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ambil data dari tabel untuk baris yang dipilih
        $stmt = $pdo->prepare("SELECT * FROM song WHERE id_song = :id");
        $stmt->bindParam(':id', $song_to_edit);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    
        <form id="editSongForm" action="edit_song_action.php?id=<?php echo $song_to_edit; ?>" method="POST" class="login">
            <p class="login-register-title">EDIT INFORMASI LAGU</p>
            <div class="input-group"><input type="text" placeholder="Judul Lagu" name="title" value="<?php echo $row['title']; ?>" required></div>
            <div class="input-group"><input type="number" min="2021" max="2024" step="1" placeholder="Tahun Rilis" name="ryear" value="<?php echo $row['year']; ?>" required></div>
            <div class="input-group"><input type="text" placeholder="Deskripsi Singkat" name="desc" value="<?php echo $row['mood']; ?>" required></div>
            <div class="input-group"><input type="submit" value="Edit" class="btn" name="btn_song"></div>
        </form>
    
    <?php
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    // Tutup koneksi database
    $pdo = null;
    ?>
    </div>
</body>
</html>
