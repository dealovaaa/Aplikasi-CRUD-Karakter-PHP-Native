<?php

    $conn = mysqli_connect('localhost:3306','root','','quis2-web-pabi');

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }