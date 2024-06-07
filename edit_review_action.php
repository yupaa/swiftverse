<?php
// Ambil data dari form
$review_to_edit = $_GET['id'];
$new_topic = $_POST['topic'];
$new_full_review = $_POST['review'];
$new_rating = $_POST['rating'];

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
    $sql = "UPDATE review SET topic=:new_topic, full_review=:new_full_review, rating=:new_rating WHERE id_review=:review_to_edit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':new_topic', $new_topic);
    $stmt->bindParam(':new_full_review', $new_full_review);
    $stmt->bindParam(':new_rating', $new_rating);
    $stmt->bindParam(':review_to_edit', $review_to_edit);
    $stmt->execute();

    // Ambil id_song berdasarkan id_review
    $sql = "SELECT id_song FROM review WHERE id_review=:review_to_edit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':review_to_edit', $review_to_edit);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $id_song = $row['id_song'];

        // Redirect ke halaman review dengan id_song
        header("Location: dashboard.php");
        exit();
    } else {
        throw new Exception("Review not found.");
    }
} catch(PDOException $e) {
    // Tangani kesalahan jika ada
    echo "Error: " . $e->getMessage();
} catch(Exception $e) {
    // Tangani kesalahan jika ada
    echo "Error: " . $e->getMessage();
}

// Tutup koneksi database
$pdo = null;
?>
