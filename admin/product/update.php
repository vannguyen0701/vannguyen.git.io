
    <?php 
    $id=$_GET['id'];
    $sl="SELECT * FROM loaihanghoa";
    $rs=mysqli_query($conn,$sl);
    $select="SELECT * FROM hanghoa WHERE MSHH =$id ";
    $sql=mysqli_query($conn,$select);
    $row_product=mysqli_fetch_array($sql);

    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $mlh=$_POST['maloaihang'];

        if($_FILES['img']['name']==''){
            $img=$row_product['Images'];
        }else{
            $img='../img/'.$_FILES['img']['name'];
            $tmp_img=$_FILES['img']['tmp_name'];
            move_uploaded_file($tmp_img,$img);
        }   

        $price=$_POST['price'];
        $amount=$_POST['amount'];
        $info=$_POST['info'];
        $note=$_POST['note'];

        $update="UPDATE hanghoa SET TenHH='$name',QuyCach='$info',Gia='$price',SoLuongHang='$amount',MaLoaiHang='$mlh',GhiChu='$note',Images='$img' WHERE MSHH='$id'";
        $rs=mysqli_query($conn,$update);        

        header("location: ../admin/index.php");
    }
?>
<style>
        .product {
            width: 100%;
            border: 1px solid var(--border-color);

        }
        
        .product__heading p {
            width: 100%;
            font-size: 2rem;
            padding: 15px;
            display: block;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.7);
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        
        .flex {
            display: flex;
        }
        
        .form__group {
            margin: 0 auto;
            padding: 8px 10px;
        }
        
        .form__input {
            width: 100%;
            height: 40px;
            margin-top: 16px;
            padding: 0px 12px;
            font-size: 1.4rem;
            border-radius: 4px;
            outline-color: #8eb0d9;
            border: 1px solid var(--border-color);
        }
        
        .flex-form {
            display: flex;
            margin-top: 20px;
        }
        
        .flex-form label {
            font-size: 1.5rem;
            color: var(--text-color);
            margin-right: 5px;
            margin-top: 4px;
        }
        
        textarea {
            outline-color: #8eb0d9;
            font-size: 1.5rem;
            margin-top: 20px;
            padding: 5px;
            border: 1px solid var(--border-color);
        }
        
        select {
            background: none;
            border-radius: 3px;
            padding: 2px;
        }
</style>
<div class="container">
    <div class="grid_admin">
        <div class="grid__row">
            <?php require_once('menu.php')?>
            <div class="col-7">
                <div class="product">
                    <div class="product__heading">
                        <p>SỬA SẢN PHẨM</p>
                    </div>
                    <div class="form__group">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="flex-form">
                                <label for="maloaihang">Thương hiệu</label>
                                <select name="maloaihang">  
                                        <?php while($row=mysqli_fetch_array($rs)) {?>
                                            <option value="<?=$row['MaLoaiHang']?>"><?=$row["TenLoaiHang"]?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            <input class="form__input" type="text" name="name" placeholder="Tên sản phẩm" value="<?=$row_product['TenHH']?>">
                            <div class="flex-form">
                                <label for="file">Ảnh đại diện</label>
                                <input type="file" name="img" value="Chọn Tệp">
                            </div>
                            <input class="form__input" type="text" name="price" placeholder="Giá bán" value="<?=$row_product['Gia']?>">
                            <input class="form__input" type="text" name="amount" placeholder="Số lượng" value="<?=$row_product['SoLuongHang']?>">
                            <input class="form__input" type="text" name='info' placeholder="Mô tả sản phẩm" value="<?=$row_product['QuyCach']?>" autocomplete="off">
                            <textarea name="note" cols="45" rows="8" placeholder="Ghi chú"></textarea><br>
                            <button class="btn btn--primary" name="update">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
