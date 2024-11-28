<?php
$sql_sua_sp = "SELECT * from tbl_sanpham where id_sanpham='$_GET[idsanpham]' limit 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);

?>


<div class="card mb-4">
    <div class="card-header bg-primary text-white">Sửa sản phẩm</div>

    <?php
    while ($row = mysqli_fetch_array($query_sua_sp)) {
    ?>
        <form action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="productName" class="form-label">Tên sản phẩm:</label>
                <input
                    value="<?php echo $row['tensanpham'] ?>"
                    name="tensanpham"
                    type="text"
                    class="form-control"
                    id="productName"
                    placeholder="Nhập tên danh mục" />
            </div>
            <div class="mb-3">
                <label for="productCode" class="form-label">Mã sản phẩm:</label>
                <input
                    value="<?php echo $row['masp'] ?>"
                    name="masp"
                    type="text"
                    class="form-control"
                    id="productCode"
                    placeholder="Nhập mã sản phẩm" />
            </div>
            <div class="mb-3">
                <label for="productCode" class="form-label">Giá sản phẩm:</label>
                <input
                    value="<?php echo $row['giasp'] ?>"
                    name="giasp"
                    type="number"
                    class="form-control"
                    id="productCode"
                    placeholder="Nhập giá sản phẩm" />
            </div>
            <div class="mb-3">
                <label for="productCode" class="form-label">Số lượng:</label>
                <input
                    value="<?php echo $row['soluong'] ?>"
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
                    placeholder="Chọn ảnh" />
                <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width="100px">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tóm tắt:</label>
                <textarea class="form-control" name="tomtat" id="" rows="3"><?php echo $row['tomtat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nội dung:</label>
                <textarea class="form-control" name="noidung" id="" rows="3"><?php echo $row['noidung'] ?></textarea>
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
                        if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                    ?>
                            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                        }
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

                    <?php
                    if ($row['tinhtrang'] == 1) {

                    ?>
                        <option value="1" selected>Kích hoạt</option>
                        <option value="0">Ẩn</option>
                    <?php
                    } else {
                    ?>
                        <option value="1">Kích hoạt</option>
                        <option value="0" selected>Ẩn</option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <button type="submit" name="suasanpham" class="btn btn-success">
                Cập nhật sản phẩm
            </button>
        </form>
    <?php
    }
    ?>

</div>
</div>