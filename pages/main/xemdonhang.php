<h3>Thông tin chi tiết đơn hàng</h3>
<?php
$code = $_GET['code'];
$sql_lietke_donhang = "SELECT * from tbl_cart_details,tbl_sanpham where tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham and tbl_cart_details.code_cart='" . $code . "'  order by tbl_cart_details.id_cart_details desc";
$query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
?>


<!-- Bảng sản phẩm -->
<div class="card">
    <div class="card-header bg-primary text-white">
        Xem đơn hàng
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>

                </tr>
            </thead>


            <tbody>
                <?php
                $i = 0;
                $tongtien = 0;
                while ($row = mysqli_fetch_array($query_lietke_donhang)) {
                    $i++;
                    $thanhtien = $row['giasp'] * $row['soluongmua'];
                    $tongtien += $thanhtien;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['tensanpham'] ?></td>
                        <td><?php echo $row['soluongmua'] ?></td>
                        <td><?php echo number_format($row['giasp']) . 'vnđ' ?></td>
                        <td><?php echo number_format($thanhtien) . 'vnđ' ?></td>


                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="6">
                        <p style="float: left; color: red; font-size: 20px; font-weight: bold; ;">Tổng tiền:<?php echo number_format($tongtien) . 'vnđ' ?></p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>