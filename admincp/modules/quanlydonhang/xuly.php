<?php



require("../../../carbon/autoload.php");
include("../../config/config.php");

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();


if (isset($_GET["code"])) {
    $code_cart = $_GET["code"];
    $sql_update  = "UPDATE tbl_cart set cart_status=0 where code_cart='" . $code_cart . "'";
    $query = mysqli_query($mysqli, $sql_update);
    //thống kê doanh thu
    $sql_lietke_donhang = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='$code_cart' order by tbl_cart_details.id_cart_details desc";
    $sql_thongke = "SELECT * from tbl_thongke where ngaydat='$now'";
    $query_thongke = mysqli_query($mysqli, $sql_thongke);
    $query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
    $soluongmua = 0;
    $doanhthu = 0;
    $tongtien = 0;
    while ($row = mysqli_fetch_array($query_lietke_donhang)) {
        // $doanhthu += $row["giasp"];
        // $soluongmua += $row["soluongmua"];
        $soluongmua += $row['soluongmua'];
        $tongtien = $row['soluongmua'] * $row['giasp'];
        $doanhthu += $tongtien;
    }
    if (mysqli_num_rows($query_thongke) == 0) {
        $soluongban = $soluongmua;
        $doanhthu = $doanhthu;
        $donhang = 1;
        $sql_update_thongke = mysqli_query($mysqli, "INSERT INTO tbl_thongke (ngaydat,soluongban,doanhthu,donhang) value('$now','$soluongban','$doanhthu','$donhang')");
    } elseif (mysqli_num_rows($query_thongke) != 0) {
        while ($row_tk = mysqli_fetch_array($query_thongke)) {
            $soluongban = $row_tk['soluongban'] + $soluongmua;
            $doanhthu = $row_tk['doanhthu'] + $doanhthu;
            $donhang = $row_tk['donhang'] + 1;
            $sql_update_thongke = mysqli_query($mysqli, "UPDATE tbl_thongke set soluongban='$soluongban',doanhthu='$doanhthu',donhang='$donhang' WHERE ngaydat='$now'");
        }
    }



    header("Location:../../index.php?action=quanlydonhang&query=lietke");
}
