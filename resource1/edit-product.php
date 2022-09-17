<?php include 'header.php';?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Chỉnh sửa Sản Phẩm</h3>
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
                <option value="" selected>Áo Nam</option>
                <option value="">Áo Nữ</option>
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
            <div class="col-md-4 pro-img">
                <img src="image/product-8.png" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Mô tả sản phẩm</label>
            <textarea name="description" class="form-control" placeholder="Mô tả sản phẩm"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php include 'footer.php'; ?>