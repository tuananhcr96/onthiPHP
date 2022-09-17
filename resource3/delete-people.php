<?php
include 'connection.php';

// SINH VIEN thực hiện xóa
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM people WHERE id=$id";
    mysqli_query($conn, $sql);
    mysqli_connect_error();
}

// chuyển  hướng về trang danh sách sản phẩm
header('Location:list-people.php');
