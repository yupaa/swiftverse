<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Taylor, Swift, songs">
    <meta name="description" content="Taylor Swift fanpage">
    <meta name="author" content="Aulia Zulfa">
    <title>Edit Review</title>
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
    $review_to_edit = $_GET['id'];

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
        $stmt = $pdo->prepare("SELECT * FROM review WHERE id_review = :id");
        $stmt->bindParam(':id', $review_to_edit);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
        <form id="editReviewForm" action="edit_review_action.php?id=<?php echo $review_to_edit; ?>" method="POST" class="login">
            <p class="login-register-title">UBAH REVIEW</p>
            <div class="input-group"><input type="text" placeholder="Judul Review" name="topic" value="<?php echo $row['topic']; ?>" required></div>
            <div class="input-group"><input type="text" placeholder="Deskripsi Review" name="review" class="large-input" value="<?php echo $row['full_review']; ?>" required ></div>
            <div class="input-group">
                <select name="rating" class="dropdown"  required>
                    <option value="<?php echo $row['rating']; ?>">Pilih Rating</option>
                    <?php
                    for ($rating = 1; $rating <= 5; $rating++) {
                        echo "<option value=\"$rating\">$rating</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group"><input type="submit" value="Tambahkan" class="btn" name="btn_review"></div>
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
