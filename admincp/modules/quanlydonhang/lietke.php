<?php
$sql_lietke_donhang = "SELECT * from tbl_cart,tbl_dangky where tbl_cart.id_khachhang=tbl_dangky.id_dangky order by tbl_cart.id_cart desc";
$query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
?>


<!-- Bảng sản phẩm -->
<div class="card">
    <div class="card-header bg-primary text-white">
        Danh sách đơn hàng
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>


            <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($query_lietke_donhang)) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['tenkhachhang'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['dienthoai'] ?></td>
                        <td><?php echo $row['cart_date'] ?></td>
                        <td>
                            <?php
                            if ($row['cart_status'] == 1) {
                                echo '<a href="modules/quanlydonhang/xuly.php?cart_status=0&code=' . $row['code_cart'] . '">Đơn hàng mới</a>';
                            } else {
                                echo 'Đã xem đơn hàng';
                            }
                            ?>
                        </td>

                        <td>
                            <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>"><button class="btn btn-warning btn-sm">Xem đơn hàng</button></a>


                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>