<?php

$sql_danhmuc = "SELECT * from tbl_danhmuc order by id_danhmuc desc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
  unset($_SESSION['dangky']);
}
?>
<div class="navbar-menu">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img
          src="img/logolaptopweb.webp"
          alt="Logo"
          width="40"
          height="40"
          class="d-inline-block align-text-top" />
        LaptopStore
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=trangchu">Trang Chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Sản Phẩm</a>
          </li>
          <!--  -->

          <!-- <?php
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
          <?php
                }
          ?> -->


          <!--  -->
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=lienhe">Liên Hệ</a>
          </li>
        </ul>
        <form action="index.php?quanly=timkiem" method="post" class="d-flex me-3">
          <input
            class="form-control me-2"
            type="search"
            name="tukhoa"
            placeholder="Tìm kiếm sản phẩm..."
            aria-label="Search" />
          <button class="btn btn-outline-success" name="timkiem" type="submit">Tìm</button>
        </form>
        <a class="btn btn-outline-info" href="index.php?quanly=giohang">
          <i class="bi bi-cart"></i> Giỏ Hàng
        </a>
        <a class="btn btn-outline-info" style="margin-left: 5px;" href="index.php?quanly=lichsudonhang">
          <i class="bi bi-cart"></i> Lịch sử đơn hàng
        </a>
        <?php
        if (isset($_SESSION['dangky'])) {


        ?>
          <a href="index.php?dangxuat=1"><button style="margin-left: 10px;" class="btn btn-outline-primary" type="submit">Đăng xuất</button></a>

        <?php
        } else {
        ?>
          <a href="index.php?quanly=dangky"><button style="margin-left: 10px;" class="btn btn-outline-primary" type="submit">Đăng ký</button></a>
        <?php
        }
        ?>
      </div>
    </div>
  </nav>
</div>