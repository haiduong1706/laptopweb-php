<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE  tbl_sanpham.id_danhmuc='$_GET[id]' order by id_sanpham desc";
$query_pro = mysqli_query($mysqli, $sql_pro);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE  tbl_danhmuc.id_danhmuc='$_GET[id]' order by id_danhmuc limit 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>



<div class="col-md-9 col-lg-10 product" style="min-height: 150vh;">
    <div class="row g-2">
        <?php
        while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
            <div class="col-3">

                <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                    <div class="thongtinsanpham">
                        <span class="khuyenmai">Giảm 11%</span>
                        <span class="tragop">Trả góp 0%</span>
                        <img
                            src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>"
                            alt="Samsung Galaxy S24 Ultra"
                            class="anhsanpham" />
                        <div class="tensanpham">
                            <?php echo $row_pro['tensanpham'] ?>
                        </div>
                        <!-- <div class="thongtin-tt">
                                <span>6.8 inches</span>
                                <span>12 GB</span>
                                <span>512 GB</span>
                            </div> -->
                        <div class="giatien">
                            <?php echo number_format($row_pro['giasp']) . 'vnđ' ?> <span class="giagoc">37,000,000₫</span>
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