<?php
$sql_sua_danhmucsp = "SELECT * from tbl_danhmuc where id_danhmuc='$_GET[iddanhmuc]' limit 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);

?>
<!-- Form điền sản phẩm -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">Sửa danh mục</div>
    <div class="card-body">
        <form action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" method="post">
            <?php
            while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
            ?>
                <div class="mb-3">
                    <label for="productName" class="form-label">Tên danh mục:</label>
                    <input
                        value="<?php echo $dong['tendanhmuc'] ?>"
                        name="tendanhmuc"
                        type="text"
                        class="form-control"
                        id="productName"
                        placeholder="Nhập tên danh mục" />
                </div>
                <div class="mb-3">
                    <label for="productCode" class="form-label">Thứ tự:</label>
                    <input
                        value="<?php echo $dong['thutu'] ?>"
                        name="thutu"
                        type="number"
                        class="form-control"
                        id="productCode"
                        placeholder="Nhập số thự tự" />
                </div>
                <button type="submit" name="suadanhmuc" class="btn btn-success">
                    Cập nhật danh mục
                </button>
            <?php
            }
            ?>
        </form>
    </div>
</div>