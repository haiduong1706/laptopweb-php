<h1 style="text-align: center;">Lịch sử đơn hàng</h1>
<div class="container container-step">
    <div class="wrapper">
        <div class="arrow-steps clearfix">
            <div class="step done"> <span><a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
            <div class="step done"> <span><a href="index.php?quanly=vanchuyen">Thông tin vận chuyển</a></span> </div>
            <div class="step done"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
            <div class="step current"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span> </div>
        </div>

        <?php
        $id_khachhang = $_SESSION['id_khachhang'];
        $sql_lietke_donhang = "SELECT * from tbl_cart,tbl_dangky where tbl_cart.id_khachhang=tbl_dangky.id_dangky and tbl_cart.id_khachhang='$id_khachhang' order by tbl_cart.id_cart desc";
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
                            <th>Hình thức thanh toán</th>
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
                                <td><?php echo $row['cart_payment'] ?></td>
                                <td>
                                    <?php
                                    if ($row['cart_status'] == 1) {
                                        echo 'Đơn hàng đang chờ xử lý';
                                    } else {
                                        echo 'Đơn hàng đang giao đến bạn';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>"><button class="btn btn-warning btn-sm">Xem đơn hàng</button></a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>