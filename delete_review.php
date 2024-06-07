<?php
// Koneksi ke database
$db_hostname = "localhost";
$db_database = "swiftverse";
$db_username = "root";
$db_password = "";
$db_charset = "utf8mb4";

try {
    $pdo = new PDO("mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil nilai slot dari URL
    $id = $_GET['id'];

    // Siapkan dan jalankan perintah SQL DELETE
    $sql = "DELETE FROM review WHERE id_review = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect ke halaman dashboard.php setelah berhasil menghapus
    header("Location: dashboard.php");
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
