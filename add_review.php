<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['username'])){
    header("location: dashboard.php");
}

include "service/database.php";

$message = "";

if(isset($_POST['btn_review'])){
    $username = $_SESSION['username'];
    $id_song = $id;
    $topic = $_POST['topic'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO review(username, id_song, topic, full_review, rating) 
            VALUES('$username', '$id_song', '$topic', '$review', '$rating')";

    if($db->query($sql)){
        header("location: review_page.php?id=$id");
    } else {
        $message = "Penambahan review gagal";
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
    <title>Tambah Review</title>
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="logregstyle.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="container">
        <form id="addReviewForm" action="add_review.php?id=<?php echo $id; ?>" method="POST" class="login">
            <p class="login-register-title">TAMBAHKAN REVIEW</p>
            <div class="input-group"><input type="text" placeholder="Judul Review" name="topic" required></div>
            <div class="input-group"><input type="text" placeholder="Deskripsi Review" name="review" class="large-input" required ></div>
            <div class="input-group">
                <select name="rating" class="dropdown" required>
                    <option value="">Pilih Rating</option>
                    <?php
                    for ($rating = 1; $rating <= 5; $rating++) {
                        echo "<option value=\"$rating\">$rating</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group"><input type="submit" value="Tambahkan" class="btn" name="btn_review"></div>
        </form>
    </div>    
    <!--JavaScript-->
    <script src="main.js"></script>
</body>
</html>
