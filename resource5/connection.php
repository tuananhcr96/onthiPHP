<?php
$conn = mysqli_connect('Localhost', 'root', '', 'phpbkap');
if (!$conn) {
	// die("Kết nối cơ sở dữ liệu thất bại!") . mysqli_connect_error();
	echo "Kết nối CSDL thất bại!";
	mysqli_connect_error();
}

// $server = "localhost";
// $user = "root";
// $pass = "";
// $database = "phpbkap";
// $conn = mysqli_connect($server, $user, $pass, $database) or die("Kết nối thất bại: <b>" . mysqli_connect_error());
// mysqli_set_charset($conn, "utf8");
