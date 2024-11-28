<?php
session_start();
include("config/config.php");
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = $_POST['password'];
    $sql = "select * from  tbl_admin where username='" . $taikhoan . "' and password='" . $matkhau . "' limit 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
    } else {
        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại");</script>';
        header("Location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .login-form {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-check-label {
            font-size: 0.9em;
        }

        .btn-primary {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="login-form">
        <h2>Đăng nhập</h2>
        <form id="loginForm"  action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Đăng nhập</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Nhập email của bạn" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu của bạn" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Nhớ tài khoản</label>
            </div>
            <button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
        </form>
        <div class="text-center mt-3">
            <a href="#">Quên mật khẩu?</a> | <a href="#">Đăng ký tài khoản mới</a>
        </div>
    </div>





</body>

</html>