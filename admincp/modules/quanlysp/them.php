<!-- Form điền sản phẩm -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">Thêm sản phẩm mới</div>
    <div class="card-body">
        <form action="modules/quanlysp/xuly.php" method="post" enctype="multipart/form-data"">
            <div class=" mb-3">
            <label for="productName" class="form-label">Tên sản phẩm:</label>
            <input
                name="tensanpham"
                type="text"
                class="form-control"
                id="productName"
                placeholder="Nhập tên danh mục" />
    </div>
    <div class="mb-3">
        <label for="productCode" class="form-label">Mã sản phẩm:</label>
        <input
            name="masp"
            type="text"
            class="form-control"
            id="productCode"
            placeholder="Nhập mã sản phẩm" />
    </div>
    <div class="mb-3">
        <label for="productCode" class="form-label">Giá sản phẩm:</label>
        <input
            name="giasp"
            type="number"
            class="form-control"
            id="productCode"
            placeholder="Nhập giá sản phẩm" />
    </div>
    <div class="mb-3">
        <label for="productCode" class="form-label">Số lượng:</label>
        <input
            name="soluong"
            type="number"
            class="form-control"
            id="productCode"
            placeholder="Nhập số lượng" />
    </div>
    <div class="mb-3">
        <label for="productCode" class="form-label">Hình ảnh:</label>
        <input
            name="hinhanh"
            type="file"
            class="form-control"
            id="productCode"
            placeholder="" />
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tóm tắt:</label>
        <textarea class="form-control" name="tomtat" id="" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nội dung:</label>
        <textarea class="form-control" name="noidung" id="" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Danh mục sản phẩm:</label>
        <select
            class="form-select form-select-lg"
            name="danhmuc"
            id="">
            <?php
            $sql_danhmuc = "select * from tbl_danhmuc order by id_danhmuc desc";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            ?>

                <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tình trạng:</label>
        <select
            class="form-select form-select-lg"
            name="tinhtrang"
            id="">

            <option value="1">Kích hoạt</option>
            <option value="0">Ẩn</option>
        </select>
    </div>


    <button type="submit" name="themsanpham" class="btn btn-success">
        Thêm sản phẩm
    </button>
    </form>
</div>
</div>