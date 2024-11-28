<?php

if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['tenkhachhang'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau = $_POST['matkhau'];
    $diachi = $_POST['diachi'];
    $sql_dangky = mysqli_query($mysqli, "insert into tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) value('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
    if ($sql_dangky) {
        echo '<p style="color: green;">Bạn đã đăng ký thành công</p>';
        $_SESSION['dangky'] = $tenkhachhang;
        $_SESSION['email'] = $email;
        $_SESSION['id_khachhang'] = mysqli_insert_id( $mysqli );
        
        header('Location:index.php?quanly=giohang');
    }
}
?>
<div class="container container-dangky">
    <h2>Đăng ký thành viên</h2>
    <?php

    ?>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="">Họ và tên:</label>
            <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="tenkhachhang">
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Điện thoại:</label>
            <input type="number" class="form-control" id="email" placeholder="Nhập số điện thoại" name="dienthoai">
        </div>
        <div class="mb-3">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="matkhau">
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Địa chỉ:</label>
            <input type="text" class="form-control" id="email" placeholder="Nhập địa chỉ" name="diachi">
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit" name="dangky" class="btn btn-primary">Đăng ký</button>
        <a href="index.php?quanly=dangnhap"><button class="btn btn-success" type="button">Đăng nhập</button></a>
    </form>
</div>