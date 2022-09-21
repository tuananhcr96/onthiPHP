<?php include 'header.php'; ?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else header('Location:list-movie.php');

if (isset($_FILES['poster']) && $_FILES['poster']['name']) {
    $duongDanFile = 'uploads/' . time() . $_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'], $duongDanFile);
    $name = $_POST['name'];
    $genre_id = $_POST['genre_id'];
    $created_date = $_POST['created_date'];
    $status = $_POST['status'];
    $intro_text = $_POST['intro_text'];
    $sql = "UPDATE movie SET name='$name',genre_id='$genre_id',created_date='$created_date',status='$status',intro_text='$intro_text',avatar='$duongDanFile' WHERE id=$id";
    mysqli_query($conn, $sql);
    mysqli_connect_error();
}

$rs = mysqli_query($conn, "SELECT * FROM movie WHERE id=$id");
$results = mysqli_fetch_assoc($rs);
$genreRS = mysqli_query($conn, "SELECT * FROM genre");

?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm mới Phim</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên Phim</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên người dùng" value="<?php echo $results['name']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn thể loại</label><span>*</span>
            <select name="genre_id" class="form-control" required>
                <option value="">--Chọn thể loại--</option>
                <?php while ($genre = mysqli_fetch_assoc($genreRS)) : ?>
                    <option value="<?php echo  $genre['id']; ?>" <?php if ($results['genre_id'] == $genre['id']) {
                                                                        echo 'selected="selected"';
                                                                    } ?>> <?php echo  $genre['name']; ?> </option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày công chiếu</label><span>*</span>
            <input type="date" class="form-control" name="created_date" value="<?php echo $results['created_date']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Trạng thái</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" <?php if ($results['status'] == 1) {
                                                                    echo 'checked = "checked"';
                                                                } ?>> Công chiếu
                </label>
                <label>
                    <input type="radio" name="status" value="0" <?php if ($results['status'] == 0) {
                                                                    echo 'checked = "checked"';
                                                                } ?>> Hết hạn
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="poster">
            <div class="col-md-4 avatar-img">
                <img src="<?php echo $results['avatar']; ?>" width="50px" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu Phim</label>
            <textarea name="intro_text" class="form-control" placeholder="Giới thiệu thiệu Phim"><?php echo $results['intro_text']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php include 'footer.php'; ?>