<?php
if (isset($_GET["dangxuat"]) && $_GET["dangxuat"] == 1) {
  unset($_SESSION['dangnhap']);
  header('Location:login.php');
}
?>

<!-- Header -->
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">Admin</a>
    <a class="navbar-brand tieude" href="index.php">Trang chủ</a>

    <!-- <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Thông báo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?dangxuat=1">Đăng xuất: <?php if (isset($_SESSION['dangnhap'])) {
                                                                        echo $_SESSION['dangnhap'];
                                                                      } ?></a>

        </li>
      </ul>
    </div>
  </div>
</nav>