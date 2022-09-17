<?php include 'header.php'; ?>
<?php
$sql = " SELECT *,people.id AS people_id, people.name AS people_name, province.name AS province_name FROM people INNER JOIN province ON people.province_id = province.id";
$peopleRS = mysqli_query($conn, $sql);


?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách người dân</h3>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="ct">STT</th>
                <th class="ct">Ảnh</th>
                <th>Tên người dân</th>
                <th>Ngày sinh</th>
                <th>Thành phố</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($people = mysqli_fetch_assoc($peopleRS)) : ?>
                <tr>
                    <td class="ct"><?php echo $people['people_id']; ?></td>
                    <td class="ct">
                        <img src="<?php echo $people['avatar']; ?>" alt="" width="50px">
                    </td>
                    <td><?php echo $people['people_name']; ?></td>
                    <td><?php echo $people['birthday']; ?></td>
                    <td><?php echo $people['province_name']; ?></td>
                    <td class="ct">
                        <a href="edit-people.php?id=<?php echo $people['people_id']; ?>" class="btn btn-xs btn-primary">Sửa</a>
                        <a href="delete-people.php?id=<?php echo $people['people_id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>