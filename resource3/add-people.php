<?php include 'header.php'; ?>
<?php
$provinceRS = mysqli_query($conn, "SELECT * FROM province");
if (isset($_FILES['avatar']) && $_FILES['avatar']['name']) {
    $duongDanFile = 'uploads/' . time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], $duongDanFile);
    $name = $_POST['name'];
    $province_id = $_POST['province_id'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    // $sql = " SELECT *,people.id AS people_id, people.name AS people_name, province.name AS province_name FROM province INNER JOIN province ON people.province_id = province.id";
    $sql = "INSERT INTO people(name,province_id,birthday,gender,about,avatar) VALUES ('$name','$province_id','$birthday','$gender','$about','$duongDanFile')";
    mysqli_query($conn, $sql);
    mysqli_connect_error();
}
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm Mới Người dân</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên Người dân</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên Người dân">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn thành phốc</label><span>*</span>
            <select name="province_id" class="form-control" required>
                <option value="">--Chọn thành phốc--</option>
                <?php while ($province = mysqli_fetch_assoc($provinceRS)) : ?>
                    <option value="<?php echo $province['id']; ?>"><?php echo $province['name']; ?> </option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày sinh</label><span>*</span>
            <input type="date" class="form-control" name="birthday" placeholder="Nhập Ngày sinh">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" checked="checked"> Nam
                </label>
                <label>
                    <input type="radio" name="gender" value="0"> Nữ
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="avatar">
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu bản thân</label>
            <textarea name="about" class="form-control" placeholder="Giới thiệu bản thân"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
    </form>
</div>

<?php include 'footer.php'; ?>