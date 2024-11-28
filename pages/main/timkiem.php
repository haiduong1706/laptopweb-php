<?php
if (isset($_POST["timkiem"])) {
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE  tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc and tbl_sanpham.tensanpham like '%" . $tukhoa . "%' ";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>



<div class="col-md-9 col-lg-10 product">
    <div class="row g-2 prd">
        <h3>Từ khóa tìm kiếm : <?php echo $_POST['tukhoa'] ?></h3>
        <?php
        while ($row = mysqli_fetch_array($query_pro)) {
        ?>
            <div class="col-3 ttsp">

                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                    <div class="thongtinsanpham">
                        <span class="khuyenmai">Giảm 11%</span>
                        <span class="tragop">Trả góp 0%</span>
                        <img
                            src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>"
                            alt="Samsung Galaxy S24 Ultra"
                            class="anhsanpham" />
                        <div class="tensanpham">
                            <?php echo $row['tensanpham'] ?>
                        </div>
                        <!-- <div class="thongtin-tt">
                                <span>6.8 inches</span>
                                <span>12 GB</span>
                                <span>512 GB</span>
                            </div> -->
                        <div class="giatien">
                            <?php echo number_format($row['giasp']) . 'vnđ' ?> <span class="giagoc">37,000,000₫</span>
                        </div>
                        <p class="thongtin">
                            Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn
                            3-6 tháng
                        </p>
                        <div class="danhgia">
                            <p>
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </p>
                            <p>Yêu thích <i class="fa-regular fa-heart"></i></p>
                        </div>
                    </div>
                </a>

            </div>
        <?php
        }
        ?>
        <!-- <div class="col">Column</div>
            <div class="col">Column</div>
            <div class="col">Column</div> -->
    </div>
</div>