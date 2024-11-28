<?php

session_start();
include("../../admincp/config/config.php");
require("../../mail/sendmail.php");
require("../../carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');


$id_khachhang = $_SESSION["id_khachhang"];
$code_order = rand(0, 9999);
$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) value('" . $id_khachhang . "','" . $code_order . "',1,'".$now."')";
$cart_query = mysqli_query($mysqli, $insert_cart);
if ($cart_query) {
    //them gio hang chi tiet
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
        mysqli_query($mysqli, $insert_order_details);
    }
    $tongtien = 0;
    $tieude = "Đặt hàng LaptopStore";
    $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng: " . $code_order . "</p>";
    $noidung .= "<h3>Đơn đặt hàng bao gồm:</h3>";
    foreach ($_SESSION["cart"] as $key => $val) {
        $thanhtien = $val['soluong'] * $val['giasp'];
        $tongtien += $thanhtien;
        $noidung .= "<ul style='border:1px solid blue; margin:10px;list-style-type: none;'>
<li>Tên sản phẩm:" . $val['tensanpham'] . "</li>
<li>Mã sản phẩm:" . $val['masp'] . "</li>
<li>Đơn giá:" . number_format($val['giasp']) . 'vnđ' . "</li>
<li>Số lượng:" . $val['soluong'] . "</li>
<li>Thành tiền:" . number_format($thanhtien) . 'vnđ' . "</li>

</ul>";
    }
    $noidung .= "<h3>Tổng tiền:" . number_format($tongtien) . 'vnđ' . "</h3>";



    $maildathang = $_SESSION["email"];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);
}

unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
