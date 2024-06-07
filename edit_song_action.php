<?php
// Ambil data dari form
$song_to_edit = $_GET['id'];
$new_title = $_POST['title'];
$new_year = $_POST['ryear'];
$new_desc = $_POST['desc'];

// Koneksi ke database
$db_hostname = "localhost";
$db_database = "swiftverse";
$db_username = "root";
$db_password = "";
$db_charset = "utf8mb4";

try {
    $pdo = new PDO("mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Siapkan dan jalankan perintah SQL UPDATE
    $sql = "UPDATE song SET title=:new_title, year=:new_year, mood=:new_desc WHERE id_song=:song_to_edit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':new_title', $new_title);
    $stmt->bindParam(':new_year', $new_year);
    $stmt->bindParam(':new_desc', $new_desc);
    $stmt->bindParam(':song_to_edit', $song_to_edit);
    $stmt->execute();

    // Redirect ke halaman php09F.php setelah berhasil mengedit
    header("Location: dashboard.php");
    exit();
} catch(PDOException $e) {
    // Tangani kesalahan jika ada
    echo "Error: " . $e->getMessage();
}

// Tutup koneksi database
$pdo = null;
?>
