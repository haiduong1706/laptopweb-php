<h1 style="text-align: center;">Giỏ Hàng</h1>
<?php
if (isset($_SESSION['cart'])) {
    // echo '<pre>';
    // print_r($_SESSION['cart']);
    // echo '</pre>';
}
?>
<div class="container-fluid giohang">
    <div class="container ">
        <div class="wrapper">
            <div class="arrow-steps clearfix">
                <div class="step current"> <span><a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
                <div class="step"> <span><a href="index.php?quanly=vanchuyen">Thông tin vận chuyển</a></span> </div>
                <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
                <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span> </div>
            </div>
        </div>
    </div>
    <h4 style="color: red;">
        <?php
        if (isset($_SESSION["dangky"])) {
            echo ' Xin chào:  ' . $_SESSION['dangky'];
        }
        ?>
    </h4>
    <table class="table table-bordered table-striped-columns">
        <thead class="table-dark">
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Tình trạng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php
        if (isset($_SESSION['cart'])) {
            $i = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                $tongtien += $thanhtien;
                $i++;
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $cart_item['masp'] ?></td>
                        <td><?php echo $cart_item['tensanpham'] ?></td>
                        <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="" width="100px"></td>
                        <td>
                            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-plus"></i></a>
                            <?php echo $cart_item['soluong'] ?>
                            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-minus"></i></a>
                        </td>
                        <td><?php echo number_format($cart_item['giasp']) . 'vnđ' ?></td>
                        <td><?php echo $cart_item['tomtat'] ?></td>
                        <td><?php echo number_format($thanhtien) . 'vnđ' ?></td>
                        <td><button type="button" class="btn btn-danger"><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></button></td>
                    </tr>
                <?php
            }
                ?>
                <tr>
                    <td colspan="9">
                        <p style="float: left; color: red; font-size: 20px; font-weight: bold; ;">Tổng tiền:<?php echo number_format($tongtien) . 'vnđ' ?></p>

                        <button style="float: right;" type="button" class="btn btn-danger"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a>
                            <div style="clear: both;"></div>
                            <?php
                            if (isset($_SESSION['dangky'])) {
                            ?>
                                <button style="float: left; margin-left: 10px" type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="index.php?quanly=vanchuyen">Hình thức vận chuyển</a></button>
                            <?php
                            } else {
                            ?>
                                <button style=" float: left; margin-left: 10px;" type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="index.php?quanly=dangky">Đăng ký đặt hàng</a></button>
                            <?php
                            }
                            ?>
                    </td>
                </tr>
            <?php
        } else {
            ?>
                <tr>
                    <td colspan=" 9">
                        <p>Hiện tại giỏ hàng trống</p>
                    </td>
                </tr>
                </tbody>
            <?php
        }
            ?>
    </table>
</div>