<?php
include('../../config/config.php');
$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
//xu ly hinhanh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time() . '_' . $hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];




if (isset($_POST['themsanpham'])) {
    //them
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc)      value('" . $tensanpham . "','" . $masp . "','" . $giasp . "','" . $soluong . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $tinhtrang . "','" . $danhmuc . "')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {
    //sua
    if($hinhanh!='') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
      
    $sql_update = "UPDATE tbl_sanpham set tensanpham ='" . $tensanpham . "',masp = '" . $masp . "',giasp = '" . $giasp . "',hinhanh = '" . $hinhanh . "',tomtat = '" . $tomtat . "',noidung = '" . $noidung . "',tinhtrang = '" . $tinhtrang . "',id_danhmuc = '" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
    //xoa anh cu
    $sql = "SELECT * from  tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' limit 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    }else{
        $sql_update = "UPDATE tbl_sanpham set tensanpham ='" . $tensanpham . "',masp = '" . $masp . "',giasp = '" . $giasp . "',tomtat = '" . $tomtat . "',noidung = '" . $noidung . "',tinhtrang = '" . $tinhtrang . "',id_danhmuc = '" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]'";
    }
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else {
    //xoa
    
    $id = $_GET['idsanpham'];
    $sql = "SELECT * from  tbl_sanpham WHERE id_sanpham = '$id' limit 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE from tbl_sanpham where id_sanpham = '" . $id . "' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
