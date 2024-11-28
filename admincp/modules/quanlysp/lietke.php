<?php
$sql_lietke_sp = "SELECT * from tbl_sanpham,tbl_danhmuc where tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc order by id_sanpham desc";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>


<!-- Bảng sản phẩm -->
<div class="card">
    <div class="card-header bg-secondary text-white">
        Danh sách danh mục
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Mã sản phẩm</th>
                    <th>Tóm tắt</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>

                </tr>
            </thead>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sp)) {
                $i++;
            ?>


                <tbody>

                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['tensanpham'] ?></td>
                        <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" width="100px"></td>
                        <td><?php echo number_format($row['giasp']) . 'vnđ' ?></td>
                        <td><?php echo $row['soluong'] ?></td>
                        <td><?php echo $row['tendanhmuc'] ?></td>
                        <td><?php echo $row['masp'] ?></td>
                        <td><?php echo $row['tomtat'] ?></td>
                        <td><?php if ($row['tinhtrang'] == 1) {
                                echo 'Kích hoạt';
                            } else {
                                echo 'Ẩn';
                            } ?></td>
                        <td>
                            <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><button style="margin:10px 0px;" class="btn btn-warning btn-sm">Sửa</button></a>

                            <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><button class="btn btn-danger btn-sm">Xóa</button></a>

                        </td>
                    </tr>

                </tbody>
            <?php
            }
            ?>

        </table>
    </div>
</div>