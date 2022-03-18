
<style>
    .format-link {
        display: inline-block;
        width: 80px;
        margin: 5px 0;
        font-size: 1.4rem;
    }
</style>
<div class="container">
    <div class="grid_admin">
        <div class="grid__row">
            <?php  require_once('menu.php')?>
            <div class="col-7">
                <div class="product">
                    <div class="product__heading">
                        <p>DANH SÁCH SẢN PHẨM</p>
                    </div>
                    <a class="product-link format-link" href="index.php?action=add">Thêm mới</a>
                    <table border='1' width="100%">
                        <thead>
                        <th>MSHH</th>
                            <th>Hình ảnh</th>
                            <th>Tên hàng hóa</th>
                            <th>Quy cách</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Thực thi</th>
                        </thead>
                        <tbody>
                            <?php
                                $sl="SELECT * FROM hanghoa";
                                $rs=mysqli_query($conn,$sl);
                                while($row=mysqli_fetch_array($rs)) { ?>
                                <tr>
                                <td><?=$row['MSHH']?></td>
                                    <td><img width="80" height="80" src="<?=$row['Images']?>" alt=""></td>
                                    <td><?=$row['TenHH']?></td>
                                    <td><?=$row['QuyCach']?></td>
                                    <td><?=number_format($row['Gia'])." VND"?></td>
                                    <td><?=$row['SoLuongHang']?></td>
                                    <td>
                                        <a class="product-link" href="index.php?action=update&id=<?=$row['MSHH']?>">Sửa</a>
                                        <a onclick="return del('<?=$row['TenHH']?>')" class="product-link" href="index.php?action=delete&id=<?=$row['MSHH']?>">Xóa</a>
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
    del=(name) => {
        return confirm('Bạn có chắc chắn xóa sản phẩm: ' + name + ' không ?');
    }
</script>