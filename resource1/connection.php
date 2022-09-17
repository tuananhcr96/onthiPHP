<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "phpbkap";
$conn = mysqli_connect($server, $user, $pass, $database) or die("Kết nối thất bại: <b>" . mysqli_connect_error());
mysqli_set_charset($conn, "utf8");
