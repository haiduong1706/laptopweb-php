<!-- thêm sản phẩm vào giỏ hàng -->
<?php
session_start();
include("../../admincp/config/config.php");
// them so luong
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
            $_SESSION['cart'] = $product;
        } else {
            if ($cart_item['soluong'] <= 9) {
                $tangsoluong = $cart_item['soluong'] + 1;
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

// tru so luong
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
            $_SESSION['cart'] = $product;
        } else {
            $trusoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] >1) {
                
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $trusoluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

// xoa san pham
if (isset($_SESSION["cart"]) && isset($_GET["xoa"])) {
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {

            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
        }
        $_SESSION['cart'] = $product;
        header('Location:../../index.php?quanly=giohang');
    }
}

//xoa tat ca

if (isset($_GET["xoatatca"]) && $_GET["xoatatca"]) {
    unset($_SESSION["cart"]);
    header('Location:../../index.php?quanly=giohang');
}

// them sanpham vao gio hang

if (isset($_POST['themgiohang'])) {
    // session_destroy();
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * from tbl_sanpham where id_sanpham='" . $id . "' limit 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp'], 'tomtat' => $row['tomtat']));
        //kiểm tra sesion gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //nếu dữ liệu trùng
                if ($cart_item['id'] == $id) {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong + 1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
                    $found = true;
                } else {
                    //nếu dữ liệu không trùng
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp'], 'tomtat' => $cart_item['tomtat']);
                }
            }
            if ($found == false) {
                //liên kết dữ liệu new_product với product
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:../../index.php?quanly=giohang');
}

?>