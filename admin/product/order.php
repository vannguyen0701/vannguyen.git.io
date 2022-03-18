
<div class="container">
    <div class="grid_admin">
        <div class="grid__row">
            <?php require_once('menu.php')?>
            <div class="col-7">
            <div class="product">
                    <div class="product__heading">
                        <p>ĐƠN ĐẶT HÀNG</p>
                    </div>
                    <table border='1' width="100%">
                        <thead>
                            <th>Số đơn đặt hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt hàng</th>
                            <th>Ngày giao hàng</th>
                            <th>Thực thi</th>
                        </thead>
                        <tbody>
                            <?php
                                $sl="SELECT * FROM dathang,khachhang WHERE khachhang.MSKH=dathang.MSKH";
                                $rs=mysqli_query($conn,$sl);
                                while($row=mysqli_fetch_array($rs)) { ?>
                                <tr>
                                    <td>
                                        <?=$row['SoDonDH']?>
                                    </td>
                                    <td>
                                        <?=$row['HoTenKH']?>
                                    </td>
                            
                                    <td>
                                        <?=number_format($row['TongTien'])." VND"?>
                                    </td>
                                    <td>
                                        <?=$row['NgayDH']?>
                                    </td>
                                    <td>
                                        <?=$row['NgayGH']?>
                                    </td>
                                    <td>
                                        <a  class="product-link" href="index.php?action=orderview&id=<?=$row['SoDonDH']?>">Xem chi tiết</a>
                                    </td>
                                </tr>
                                <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function del(name){
        return confirm('Bạn có chắc chắn xóa đơn hàng:' +name+' không?');
    }
</script>