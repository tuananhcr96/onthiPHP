<?php include 'header.php';?>
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
            <tr>
                <td class="ct">1</td>
                <td class="ct">
                    <img src="image/b1.jpg" alt="" width="50px">
                </td>
                <td >Excape Plance</td>
                <td >20/10/1995</td>
                <td>Hàn động</td>
                <td  align="center">
                    <a href="edit-book.php" class="btn btn-xs btn-primary">Sửa</a>
                    <a href="delete-book.php" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
            </tr>
            <tr>
                <td class="ct">2</td>
                <td class="ct">
                    <img src="image/b2.jpg" alt="" width="50px">
                </td>
                <td >Vua bài</td>
                <td >15/07/1996</td>
                <td>Hàn động - hài</td>
                <td  align="center">
                    <a href="edit-book.php" class="btn btn-xs btn-primary">Sửa</a>
                    <a href="delete-book.php" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
            </tr>
            <tr>
                <td class="ct">3</td>
                <td class="ct">
                    <img src="image/b3.jpg" alt="" width="50px">
                </td>
                <td >Thần Điêu Đại Hiệp</td>
                <td >112/08/1999</td>
                <td>Liếm hiệp</td>
                <td align="center">
                    <a href="edit-book.php" class="btn btn-xs btn-primary">Sửa</a>
                    <a href="delete-book.php" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>