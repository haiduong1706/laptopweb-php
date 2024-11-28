<?php
$sql_lietke_danhmucsp = "SELECT * from tbl_danhmuc order by thutu desc";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
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
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>


            <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['tendanhmuc'] ?></td>
                        <td>
                            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><button class="btn btn-warning btn-sm">Sửa</button></a>
                            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><button class="btn btn-danger btn-sm">Xóa</button></a>

                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>