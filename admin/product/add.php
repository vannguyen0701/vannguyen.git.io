
    <?php 
        $sl="SELECT * FROM loaihanghoa";
        $rs=mysqli_query($conn,$sl);
    if(isset($_POST['add'])){
        $name=$_POST['name'];
        $mlh=$_POST['maloaihang'];

        $img='../img/'.$_FILES['img']['name'];
        $tmp_name=$_FILES['img']['tmp_name'];

        $price=$_POST['price'];
        $amount=$_POST['amount'];
        $info=$_POST['info'];
        $note=$_POST['note'];

        move_uploaded_file($tmp_name,$img);
        $is="INSERT INTO `hanghoa`(`TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GhiChu`, `Images`) VALUES ('$name','$info','$price','$amount','$mlh','$note','$img')";
        $rs=mysqli_query($conn,$is);
    
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
            font-size: 1.5rem;
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

        }
        
        select {
            outline: none;
            border-radius: 3px;
            padding: 2px;
        }
</style>

<div class="container">
    <div class="grid_admin">  
        <div class="grid__row">
            <?php require_once("menu.php")?>
            <div class="col-7">
                <div class="product">
                    <div class="product__heading">
                        <p>THÊM MỚI SẢN PHẨM</p>
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
                            <input class="form__input" type="text" name="name" placeholder="Tên sản phẩm" autocomplete="off">
                            <div class="flex-form">
                                <label for="file">Ảnh đại diện</label>
                                <input type="file" name="img" value="Chọn Tệp">
                            </div>
                            <input class="form__input" type="text" name="price" placeholder="Giá bán" autocomplete="off">
                            <input class="form__input" type="text" name="amount" placeholder="Số lượng" autocomplete="off">
                            <input class="form__input" type="text" name='info' placeholder="Mô tả sản phẩm" autocomplete="off">
                            <textarea name="note" cols="45" rows="8" placeholder="Ghi chú"></textarea><br>
                            <button class="btn btn--primary" name="add">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    