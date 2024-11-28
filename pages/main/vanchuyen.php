<h1 style="text-align: center;">Thông tin vận chuyển</h1>
<div class="container container-step">
    <div class="wrapper">
        <div class="arrow-steps clearfix">
            <div class="step done"> <span><a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
            <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Thông tin vận chuyển</a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span> </div>
        </div>
    </div>
    <?php
    if (isset($_POST["themvanchuyen"])) {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $note = $_POST["note"];
        $phone = $_POST["phone"];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) values('$name','$phone','$address','$note','$id_dangky')");
        if ($sql_them_vanchuyen) {
            echo '<script>alert("Thêm thông tin vận chuyển thành công")</script>';
        }
    }elseif (isset($_POST['capnhatvanchuyen'])) {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $note = $_POST["note"];
        $phone = $_POST["phone"];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping set name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' where id_dangky='$id_dangky'");
        if ($sql_update_vanchuyen) {
            echo '<script>alert("Cập nhật thông tin vận chuyển thành công")</script>';
        }
    
    }
    ?>
    <?php
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * from tbl_shipping where id_dangky='$id_dangky' limit 1");
    $count = mysqli_num_rows($sql_get_vanchuyen);
    if ($count > 0) {
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $name = $row_get_vanchuyen['name'];
        $address = $row_get_vanchuyen['address'];
        $note = $row_get_vanchuyen['note'];
        $phone = $row_get_vanchuyen['phone'];
    } else {
        $name = '';
        $address = '';
        $note = '';
        $phone = '';
    }
    ?>
    <form action="" method="post" class="mb-3">
        <div class="mb-3 mt-3">
            <label for="">Họ và tên:</label>
            <input type="text" class="form-control" value="<?php echo $name ?>" id="" placeholder="Nhập họ và tên" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Điện thoại:</label>
            <input type="number" class="form-control" value="<?php echo $phone ?>" id=" email" placeholder="Nhập số điện thoại" name="phone">
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Địa chỉ:</label>
            <input type="text" class="form-control" value="<?php echo $address ?>" id=" email" placeholder="Nhập địa chỉ" name="address">
        </div>
        <div class="mb-3 mt-3">
            <label for="">Ghi chú</label>
            <input type="text" class="form-control" value="<?php echo $note ?>" id=" email" placeholder="Nhập ghi chú" name="note">
        </div>
        <?php
        if ($name == '' && $phone == '') {
        ?>
            <button type="submit" name="themvanchuyen" class="btn btn-primary">Lưu thông tin vận chuyển</button>
        <?php
        } elseif ($name != '' && $phone != '') {
        ?>
            <button type="submit" name="capnhatvanchuyen" class="btn btn-warning">Cập nhật thông tin vận chuyển</button>
        <?php
        }
        ?>
    </form>
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
                            <!-- <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-plus"></i></a> -->
                            <?php echo $cart_item['soluong'] ?>
                            <!-- <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-minus"></i></a> -->
                        </td>
                        <td><?php echo number_format($cart_item['giasp']) . 'vnđ' ?></td>
                        <td><?php echo $cart_item['tomtat'] ?></td>
                        <td><?php echo number_format($thanhtien) . 'vnđ' ?></td>
                    </tr>
                <?php
            }
                ?>
                <tr>
                    <td colspan="9">
                        <p style="float: left; color: red; font-size: 20px; font-weight: bold; ;">Tổng tiền:<?php echo number_format($tongtien) . 'vnđ' ?></p>


                        <div style="clear: both;"></div>
                        <?php
                        if (isset($_SESSION['dangky'])) {
                        ?>
                            <button style="float: left; margin-left: 10px" type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a></button>
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