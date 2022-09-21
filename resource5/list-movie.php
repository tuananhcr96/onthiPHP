<?php include 'header.php'; ?>
<?php
$sql = "SELECT *,movie.id AS movie_id, movie.name AS movie_name, genre.name AS genre_name FROM movie INNER JOIN genre ON movie.genre_id = genre.id";
$movieRS = mysqli_query($conn, $sql);

?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách Phim</h3>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="ct">STT</th>
                <th class="ct">Ảnh</th>
                <th>Tên Phim</th>
                <th>Ngày công chiếu</th>
                <th>Thể loại</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($movie = mysqli_fetch_assoc($movieRS)) : ?>
                <tr>
                    <td class="ct"><?php echo $movie['movie_id']; ?> </td>
                    <td class="ct">
                        <img src="<?php echo $movie['avatar']; ?>" alt="" width="50px">
                    </td>
                    <td><?php echo $movie['movie_name']; ?></td>
                    <td><?php echo $movie['created_date']; ?></td>
                    <td><?php echo $movie['genre_name']; ?></td>
                    <td align="center">
                        <a href="edit-book.php?id=<?php echo $movie['movie_id']; ?>" class="btn btn-xs btn-primary">Sửa</a>
                        <a href="delete-movie.php?id=<?php echo $movie['movie_id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>