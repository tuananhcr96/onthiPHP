<?php include 'header.php'; ?>
<?php
$categoryRS = mysqli_query($conn, "SELECT * FROM category");
if (isset($_FILES['image']) && $_FILES['image']['name'] != NULL) {
    $duongDanFile = 'uploads/' . time() . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $duongDanFile);
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $sql = "INSERT INTO product(name,category_id,price,status,description,image) VALUES ('$name','$category_id','$price','$status','$description','$duongDanFile')";
    mysqli_query($conn, $sql);
    mysqli_connect_error();
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm Mới Sản Phẩm</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên sản phẩm</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Danh mục sản phẩm</label><span>*</span>
            <select name="category_id" class="form-control" required="required">
                <option value="">--Chọn Danh Mục--</option>
                <?php while ($category = mysqli_fetch_assoc($categoryRS)) : ?>
                    <option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> </option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giá sản phẩm</label><span>*</span>
            <input class="form-control" name="price" placeholder="Nhập giá sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Trạng thái sản phẩm</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" checked="checked"> Hiện
                </label>
                <label>
                    <input type="radio" name="status" value="0"> Ẩn
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh sản phẩm</label>
            <input type="file" name="image">
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Mô tả sản phẩm</label>
            <textarea name="description" class="form-control" placeholder="Mô tả sản phẩm"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
    </form>
</div>

<?php include 'footer.php'; ?>