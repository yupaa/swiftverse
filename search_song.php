<?php
include "service/database.php";

if (isset($_GET['q'])) {
    $q = $db->real_escape_string($_GET['q']);
    $sql = "SELECT * FROM song WHERE title LIKE '%$q%' OR mood LIKE '%$q%'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='box-song'>";
            echo "<a href='review_page.php?id=".$row['id_song']."'>";
            echo "<h3>".$row["title"]."</h3>";
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
            echo "</a>";
            echo "</div>\n";
        }
    } else {
        echo "<p>Tidak ada hasil pencarian</p>";
    }
}
?>
