<div class="col-md-3 col-lg-2 sidebar">
  <h5>Danh Mục Sản Phẩm</h5>
  <ul class="nav flex-column">
    <?php
    $sql_danhmuc = "SELECT * from tbl_danhmuc order by id_danhmuc desc";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
    while ($row = mysqli_fetch_array($query_danhmuc)) {
    ?>

      <li class="nav-item">
        <a class="nav-link active" href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a>
      </li>
    <?php
    }
    ?>

  </ul>
</div>