<?php include 'header.php'; ?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else header('Location:list-people.php');

if (isset($_FILES['avatar']) && $_FILES['avatar']['name']) {
    $duongDanFile = 'uploads/' . time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], $duongDanFile);
    $name = $_POST['name'];
    $province_id = $_POST['province_id'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    $sql = "UPDATE people SET name='$name',province_id='$province_id',birthday='$birthday',gender='$gender',about='$about',avatar='$duongDanFile' WHERE id=$id ";
    mysqli_query($conn, $sql);
    mysqli_connect_error();
}

$rs = mysqli_query($conn, "SELECT * FROM people WHERE id=$id");
$results = mysqli_fetch_assoc($rs);
$provinceRS = mysqli_query($conn, "SELECT * FROM province");


?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Chỉnh Sửa người dân</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên người dân</label><span>*</span>
            <input class="form-control" name="name" value="<?php echo $results['name']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn thành phố</label><span>*</span>
            <select name="province_id" class="form-control" required>
                <option value="">--Chọn thành phố--</option>
                <?php while ($province = mysqli_fetch_assoc($provinceRS)) : ?>
                    <option value="<?php echo $province['id']; ?>" <?php if ($results['province_id'] == $province['id']) {
                                                                        echo 'selected = "selected"';
                                                                    } ?>><?php echo $province['name']; ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày sinh</label><span>*</span>
            <input type="date" class="form-control" name="birthday" value="<?php echo $results['birthday']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" <?php if ($results['gender'] == 1) {
                                                                    echo 'checked="checked"';
                                                                } ?>> Nam
                </label>
                <label>
                    <input type="radio" name="gender" value="0" <?php if ($results['gender'] == 0) {
                                                                    echo 'checked="checked"';
                                                                } ?>> Nữ
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="avatar">
            <div class="col-md-4 avatar-img">
                <img src="<?php echo $results['avatar']; ?>" width="50px" class="img-responsive">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu bản thân</label>
            <textarea name="about" class="form-control" placeholder="Giới thiệu bản thân"><?php echo $results['about']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php include 'footer.php'; ?>