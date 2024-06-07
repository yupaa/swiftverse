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
    <section class="about" id="about">
        <div class="about-text">
            <h2>Who is Taylor Swift?</h2>
            <p><br>Taylor Swift adalah seorang musisi berkebangsaan Amerika yang lahir pada 13 Desember 1989. Ia dikenal karena lirik lagu yang diciptakannya sangat puitis dan <i>somehow relate</i> dengan kehidupan kaula muda pada saat ini<br><br><br><br<</p>
            <h2>Her Discography</h2>
            <p><br>Dimulai dari debutnya pada tahun 2006, total ia sudah merilis 10 album. Ia juga sedang dalam misi melakukan recording ulang untuk 6 album pertamanya dalam rangka mendapatkan hak cipta penuh untuk semua karyanya. <br><br></p>
            <p>Album repackage miliknya dirilis ulang dengan menambahkan frasa '(Taylor's Version)' di akhir kata. Selain itu, ia juga memasukkan lagu-lagu baru ke dalam album repackage yang belum pernah dirilis sebelumnya dengan menambahkan frasa '(From the Vault)' di akhir judulnya.<br><br></p>
            <p>Website ini secara khusus akan membahas lagu yang ada pada album repackage milik Taylor<br><br></p>
        </div>
        <div class="about-albums">
            <img src="src/fearless tv.png" alt="fearless" onclick="openPopup('popup-fearless')">
            <img src="src/red tv.png" alt="red" onclick="openPopup('popup-red')">
            <img src="src/speak now tv.png" alt="speak now tv.jpg" onclick="openPopup('popup-speaknow')">
            <img src="src/1989 tv.png" alt="1989 tv" onclick="openPopup('popup-1989')">
        </div>
        <div class="pop-up">
            <div class="popup-container" id="popup-fearless">
                <div class="popup-content">
                    <span class="close" onclick="closePopup()"><i class='bx bx-window-close'></i></span>
                    <h2>Fearless (Taylor's Version)</h2>
                    <p><i>Rilis: 9 April 2021</i></p>
                </div>
            </div>
            <div class="popup-container" id="popup-red">
                <div class="popup-content">
                    <span class="close" onclick="closePopup()"><i class='bx bx-window-close'></i></span>
                    <h2>Red (Taylor's Version)</h2>
                    <p><i>Rilis: 12 November 2021</i></p>
                </div>
            </div>
            <div class="popup-container" id="popup-speaknow">
                <div class="popup-content" id="popup-speaknow">
                    <span class="close" onclick="closePopup()"><i class='bx bx-window-close'></i></span>
                    <h2>Speak Now (Taylor's Version)</h2>
                    <p><i>Rilis: 7 Juli 2023</i></p>
                </div>
            </div>
            <div class="popup-container" id="popup-1989">
                <div class="popup-content" id="popup-1989">
                    <span class="close" onclick="closePopup()"><i class='bx bx-window-close'></i></span>
                    <h2>1989 (Taylor's Version)</h2>
                    <p><i>Rilis: 27 Oktober 2021</i></p>
                </div>
            </div>
        </div>
    </section>

    <!--JavaScript-->
    <script src="main.js"></script>
</body>

</html>