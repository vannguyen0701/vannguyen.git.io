
 <?php                      
    $id=$_GET['id'];
    $sl="SELECT * FROM hanghoa,chitietdachang WHERE hanghoa.MSHH=chitietdachang.MSHH AND SoDonDH='$id'";
    $rs=mysqli_query($conn,$sl);
?>
<div class="container">
    <div class="grid_admin">
        <div class="grid__row">
            <?php  require_once('menu.php')?>
            <div class="col-7">
                <div class="product">
                    <div class="product__heading">
                        <p>ĐƠN HÀNG <?=$id?></p>
                    </div>
                    <table border='1' width="100%">
                        <thead>
                            <th>Hình ảnh</th>
                            <th>Tên hàng hóa</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </thead>
                        <tbody>
                            <?php
                                while($row=mysqli_fetch_array($rs)) { ?>
                                <tr>
                                    <td>
                                        <img width="80" height="80" src="<?=$row['Images']?>" alt="">
                                    </td>
                                    <td>
                                        <?=$row['TenHH']?>
                                    </td>
                            
                                    <td>
                                        <?=$row['SoLuong']?>
                                    </td>
                                    <td>
                                        <?=number_format($row['GiaDatHang'])." VND"?>
                                    </td>
                                </tr>
                                <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?action=order" class="btn btn--primary btn-back">Quay lại</a>
            </div>
        </div>
    </div>
</div>