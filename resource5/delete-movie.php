<?php
include 'connection.php';

// SINH VIEN thực hiện{
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM movie WHERE id=$id";
    mysqli_query($conn, $sql);
    mysqli_connect_error();
}

// chuyển  hướng về trang danh sách sản phẩm
header('Location:list-movie.php');
