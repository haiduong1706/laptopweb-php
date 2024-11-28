<?php
$sql_chitiet = "SELECT * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham= '$_GET[id]' limit 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <h4 style="text-align: center;">Thông tin sản phẩm</h4>
    <div class="container container-sanpham " style="min-height: 100vh;">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6 img-chitietsanpham">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" alt="Hình ảnh sản phẩm">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6 chitietsp">
                <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="post">
                    <h5>Tên Sản Phẩm: <?php echo $row_chitiet['tensanpham'] ?></h5>
                    <p class="text-muted">Mã sản phẩm: <strong><?php echo $row_chitiet['masp'] ?></strong></p>
                    <p class="text-danger h4">Giá: <?php echo number_format($row_chitiet['giasp']) . 'vnđ' ?></p>
                    <p class="text-black">
                        Số lượng: <?php echo $row_chitiet['soluong'] ?>
                    </p>
                    <p class="text-black">
                        Tình trạng: <?php echo $row_chitiet['tomtat'] ?>
                    </p>
                    <p class="text-black">
                        Danh mục: <?php echo $row_chitiet['tendanhmuc'] ?>
                    </p>
                    <button class="btn btn-success btn-lg" name="themgiohang">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>