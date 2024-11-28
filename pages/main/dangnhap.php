
<div class="container container-dangnhap">
    <h5 class="text-center">Đăng nhập</h5>
    <div class="mb-3">
    <?php


    if (isset($_POST['dangnhap'])) {
        $email = $_POST['email'];
        $matkhau = $_POST['matkhau'];
        $sql = "select * from  tbl_dangky where email='" . $email . "' and matkhau='" . $matkhau . "' limit 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
            header("Location:index.php?quanly=giohang");
        } else {
            echo '<p style="color: red;">Email hoặc mật khẩu sai, vui lòng nhập lại.</p>';
        }
    }
    ?>
</div>
    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Email:</label>
            <input type="text" name="email" class="form-control" id="username" placeholder="Nhập email của bạn" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="matkhau" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn" required>
        </div>

        <button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>