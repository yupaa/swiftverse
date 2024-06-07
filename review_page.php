<?php
session_start();

$id = $_GET['id'];

if(!isset($_SESSION['username'])){
    header("location: dashboard.php#song");
}

include "service/database.php";

$sql = "SELECT * FROM review WHERE id_song=$id";
$result = $db->query($sql);

$sql2 = "SELECT * FROM song WHERE id_song=$id";
$result2 = $db->query($sql2);

$db->close();
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
    <link rel="icon" type="image/png" href="src/logo.png">
    <!--CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <?php include "header.php" ?>
    <section class="review" id="review">
        <div class="review-text">
            
            <h1> <br> Swifties said... <br></h1>
            <?php
                foreach ($result2 as $row){
                    echo "Song title: ".$row["title"]."<br>";
                    echo "Released year: ".$row["year"];
                }
                echo'<br>';
                echo'<br>';
                echo '<a href="add_review.php?id='.$id.'" class="btn">Tambah Review</a>';
                echo'<br>';
                echo'<br>';
            ?>

            <?php
                if ($result->num_rows > 0) {
                    // Loop melalui hasil query dan menampilkan data
                    foreach ($result as $row) {
                        
                        echo "<div class='review-user'>";
                        if ($_SESSION['username']==$row["username"] || $_SESSION['username']=="admin") {
                            echo '<div class="admin-icons">';
                            echo '<a href="edit_review.php?id='.$row["id_review"].'" class="bx bx-edit"></a>';
                            echo '<a href="delete_review.php?id='.$row["id_review"].'" class="bx bx-trash"></a>';
                            echo '</div>';
                        }
                        echo "<h3>".$row["username"]."</h3>";
                        echo "<div class='rating'>";
                        for ($i = 0; $i < $row["rating"]; $i++) {
                        echo "<i class='bx bxs-star'></i>";
                        }
                         echo "</div>";
                         echo "<p>" . $row["topic"] . "</p>";
                         echo "<p></p>"; // Perbaiki kesalahan ketik dan format
                         echo "<p>" . $row["full_review"] . "</p>";
                         echo "</div>\n"; 
                        
                        
                        echo "</div>"; 

                        
                    }
                } else {
                    echo "<p>No records found</p>";
                }
            ?>
        </div>
    </section>

    <!--JavaScript-->
    <script src="main.js"></script>
</body>
</html>
