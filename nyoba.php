<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Taylor, Swift, songs">
    <meta name="description" content="Taylor Swift fanpage">
    <meta name="author" content="Aulia Zulfa">
    <title>Tambah Review Lagu</title>
    <!--CSS-->
    <link rel="stylesheet" href="logregstyle.css">
    <!--Box Icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        .large-input {
            width: 100%;
            height: 40px;
            font-size: 18px;
            padding: 10px;
            box-sizing: border-box;
        }
        .large-textarea {
            width: 100%;
            height: 200px;
            font-size: 18px;
            padding: 10px;
            box-sizing: border-box;
            resize: none; /* Prevent resizing */
        }
        .dropdown {
            width: 100%;
            height: 40px;
            font-size: 18px;
            padding: 10px;
        }
        .btn {
            font-size: 18px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="addReviewForm" action="add_review.php" method="POST" class="login">
            <p class="login-register-title">TAMBAHKAN LAGU</p>
            <div class="input-group">
                <input type="text" placeholder="Judul Review" name="topic" class="large-input" required>
            </div>
            <div class="input-group">
                <textarea placeholder="Deskripsi Review" name="songdesc" class="large-textarea" required></textarea>
            </div>
            <div class="input-group">
                <select name="rate" class="dropdown" required>
                    <option value="">Pilih Rating</option>
                    <?php
                    for ($rating = 1; $rating <= 5; $rating++) {
                        echo "<option value=\"$rating\">$rating</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <input type="submit" value="Tambahkan" class="btn" name="btn_review">
            </div>
        </form>
    </div>
</body>
</html>
