<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database_name = "swiftverse";

    $db = mysqli_connect($hostname, $username, $password, $database_name);

    if($db->connect_error){
        echo "koneksi data rusak";
        die("error!");
    }
?>