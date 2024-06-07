<?php
include "service/database.php";

$sql = "SELECT * FROM song";
$result = $db->query($sql);
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
    <section class="song" id="song">
        <div class="song-text">
            <h1>Songs Recommendation<br><br></h1>
            <p>Lagi pengen nge-galau karena doi udah punya yang lain? Mau dengerin yang happy happy buat naikin mood nugas? Atau mau yang membakar semangat buat nemenin beres-beres di akhir pekan?</p>
            <p>No need to worry, Swifties! Taylor Swift punya semuanya!<br><br></p>
            <p>Cari rekomendasi lagu sesuai mood kamu di sini!<br><br></p>
        </div>
        <div class="search-song">
            <input type="search" id="search-song" placeholder="cari di sini...">
            <br><br>
        </div>
        <?php
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
            echo '<div class="admin-actions">';
            echo '<a href="add_song.php" class="btn">Tambah Lagu</a>';
            echo '</div>';
        }
        ?>
        <br>
        <br>
        <div id="all-songs" class="list-song">
        <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<a href='review_page.php?id=".$row['id_song']."'>";
        echo "<div class='box-song'>";
        echo "<br>";
        
        echo "<h3>".$row["title"]."</h3>";
        echo "<br>";
        echo "<p>".$row["year"]."</p>";

        $sql2 = "SELECT AVG(rating) as average_rating FROM review WHERE id_song=" . $row['id_song'];
        $result2 = $db->query($sql2);
        
        if ($result2 && $result2->num_rows > 0) {
            $average_rating = $result2->fetch_assoc()["average_rating"];
            echo "<p><i class='bx bxs-star'></i>" . round($average_rating, 1) . "</p>";
        } else {
            echo "<p><i class='bx bxs-star'></i> No ratings yet</p>";
        }

        if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
            echo '<div class="admin-icons">';
            echo '<a href="edit_song.php?id='.$row["id_song"].'" class="bx bx-edit"></a>';
            echo '<a href="delete_song.php?id='.$row["id_song"].'" class="bx bx-trash"></a>';
            echo '</div>';
        }
        
        echo "</div>\n";
        echo "</a>";
    }
} else {
    echo "<p>No records found</p>";
}
$db->close();
?>
        </div>
        <div id="search-results" class="list-song" style="display: none;"></div>
    </section>

    <!--JavaScript-->
    <script src="live_search.js"></script>
</body>
</html>
