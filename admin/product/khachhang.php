
<style>
    .btn-format{
        display: inline-block;
        width: 50px;
        background-color: rgba(0,0,0,0.6) !important;
    }
</style>
<div class="container">
    <div class="grid_admin">
        <div class="grid__row">
            <?php require_once('./product/menu.php')?>
            <div class="col-7">
                <div class="product">
                    <div class="product__heading">
                        <p>THÔNG TIN KHÁCH HÀNG</p>
                    </div>

                    <table border='1' width="100%">
                        <thead>
                            <th>Mã số</th>
                            <th>Họ tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                        </thead>
                        <tbody>
                            <?php
                                $sl="SELECT * FROM khachhang";
                                $rs=mysqli_query($conn,$sl);
                                while($row=mysqli_fetch_array($rs)) { ?>
                                <tr>
                                    <td>
                                        <?=$row['MSKH']?>
                                    </td>
                                    <td>
                                        <?=$row['HoTenKH']?>
                                    </td>
                                    <td>
                                        <?=$row['DiaChi']?>
                                    </td>
                                    <td>
                                        <?=$row['SoDienThoai']?>
                                    </td>
                                    <td>
                                        <?=$row['Email']?>
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
