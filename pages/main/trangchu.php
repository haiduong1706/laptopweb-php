<div class="container trangchu">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="0"
                class="active"></button>
            <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="1"></button>
            <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="2"></button>
            <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="3"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img
                    src="img/slide1.jpg"
                    alt="Los Angeles"
                    class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="img/slide2.jpg" alt="Chicago" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img
                    src="img/slide3.jpg"
                    alt="New York"
                    class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img
                    src="img/slide4.jpg"
                    alt="New York"
                    class="d-block w-100" />
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#demo"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#demo"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <?php
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE  tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc order by tbl_sanpham.id_sanpham asc  limit 4";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>



    <div class="product-trangchu">
        <h1>Sản phẩm mới nhất:</h1>
        <div class="row g-2 prd">
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

</div>
