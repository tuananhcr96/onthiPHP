<?php include 'header.php'; ?>
<?php
$sql = "SELECT * FROM product";
$results = mysqli_query($conn, $sql);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách sản phẩm</h3>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="ct">STT</th>
                <th class="ct">Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product = mysqli_fetch_assoc($results)) : ?>
                <tr>
                    <td class="ct"><?php echo $product['id']; ?></td>
                    <td class="ct">
                        <img src="<?php echo $product['image']; ?>" alt="" width="70px">
                    </td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php if ($product['status'] == 1) echo "Hiện";
                        else echo "Ẩn"; ?></td>
                    <td class="ct">
                        <a href="edit-product.php" class="btn btn-xs btn-primary">Sửa</a>
                        <a href="delete-product.php?id=<?php echo $product['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>