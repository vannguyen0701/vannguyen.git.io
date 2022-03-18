<?php
ob_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['user'])){
        header("location: dangnhap.php");
    }else{
        $user=((isset($_SESSION['user'])) ? $_SESSION['user']:[]);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/sell.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
        <link href="../font/css/all.min.css" rel="stylesheet">
        <title>Giỏ Hàng</title>
        <style>
            .content {
                height: 55px;
                background-color: #fff;
                margin: 10px 0;
                border-radius: 2px;
                display: flex;
                justify-content: space-between;
            }
            
            .content__product {
                font-size: 1.4rem;
                color: var(--text-color);
                line-height: 55px;
                padding: 0 60px;
            }
            
            .cart__detail {
                background-color: #fff;
                margin-bottom: 10px;
                border-radius: 2px;
                display: flex;
                justify-content: space-between;
            }
            
            .content__price {
                display: flex;
                align-items: center;
                font-size: 1.4rem;
                color: var(--text-color);
            }
            
            .content__price span {
                padding: 0 50px;
            }
            
            .product {
                padding: 10px 40px;
                display: flex;
            }
            
            .product__name {
                font-size: 1.4em;
                color: var(--text-color);
                margin-top: 5px;
            }
            
            .cart__price {
                display: flex;
                align-items: center;
                font-size: 1.4rem;
                color: var(--text-color);
            }
            
            .cart__price span {
                padding: 0 50px;
            }
            .cart__price-mg{
                outline: none;
                margin-right: 30px;
                text-align: center;
                padding: 1px;
            }

            .btn-input{
                outline: none;
                margin-right: 10px;
                width: 70px !important;
            }
            
            .cart-name {
                font-size: 2.5rem;
                margin: 20px 0 0;
            }
            
            .total {
                background-color: #fff;
                font-size: 1.5rem;
                color: var(--text-color);
                border-radius: 2px;
                padding: 15px;
                display: flex;
                justify-content: flex-end;
            }
            
            .total-label{
                margin-right: 50px;
                line-height: 30px;
                color: var(--primary-color);
            }
            .format-btn{
                width: 150px !important;
                line-height: 33px ;
            }
            .info{
                margin-top: 20px;
                float: right;
            }
            .form-group {
                margin: 0px 35px 0;
            }
            .form-group label{
                font-size: 1.4em;
                color: var(--text-color);
            }
            .form-group input{
                background-color: #f0f0f0;
                width: 100%;
                height: 35px;
                margin-bottom: 10px;
                padding: 0px 12px;
                border: 1px solid rgb(214, 214, 214);
                border-radius: 4px;
                outline-color: var(--border-color);
            }
            .btn-r{
                float: right;
                width: 150px !important;
                margin-bottom: 20px;
                margin-top: 10px;
            }
            .error{
                display: block;
                font-size: 1.4rem;
                color: red;
                text-align: center;
                margin: 10px 0;
            }
            .input{
            width: 100%;
            height: 100%;
            outline: none;
            border: none;
            font-size: 1.4rem;
        }
        </style>
    </head>

    <body>
        <?php 
        include 'conn.php';
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }
        $mgs=false;
        function cart($add=false){
            if(isset($_POST['amount'])){
                // $amount=['$id'];
                foreach($_POST['amount'] as $id => $amount){
                    if($add){
                        $_SESSION['cart'][$id] += $amount;
                    }else{
                        $_SESSION['cart'][$id] = $amount;
                    }
                }
            }
        }
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case"add";
                    cart($add=true);    
                    header("location: cart.php");
                    break;
                case"delete";
                    if(isset($_GET['id'])){
                        unset($_SESSION['cart'][$_GET['id']]);
                    }
                    header("location: cart.php");
                    break;
                case"submit";
                    if(isset($_POST['update_order'])){
                        cart();
                        header("location: cart.php");
                    }elseif(isset($_POST['order'])){
                        // if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['address'])){
                        //     $mgs="Vui lòng nhập đầy đủ thông tin!";
                        // }
                        if(!empty($_POST['amount'])){
                            $sl="SELECT * FROM hanghoa WHERE MSHH IN (".implode(",",array_keys($_POST['amount'])).")";
                            $sql=mysqli_query($conn,$sl);
                            $total=0;
                            $orrderproduct=array();
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $ngayDH=date("Y-m-d H:i");
                            $settime=mktime(0,0,date("Y"),date("m"),date("d")+3);
                            $ngayGH=date("Y-m-d",$settime);
                            while($row=mysqli_fetch_array($sql)){
                                $orrderproduct [] =$row;
                                $total +=$_POST['amount'][$row['MSHH']] * $row['Gia'];
                            }
    
                                     // insert gio hang vao tbl dat hang
                            $is="INSERT INTO `dathang` (`SoDonDH`, `MSKH`,`TongTien`,`NgayDH`, `NgayGH`) VALUES (NULL,'".$user["MSKH"]."','".$total."','".$ngayDH."', '".$ngayGH."')";
                            $sql=mysqli_query($conn,$is);
                            
                            $orderid=mysqli_insert_id($conn);
                            $string="";
                            foreach($orrderproduct as $key => $product){
                                $string .="('".$orderid."', '".$product['MSHH']."', '".$_POST['amount'][$product['MSHH']]."', '".$product['Gia']."',NULL)";
                                if($key !=count($orrderproduct)-1){
                                    $string .=","; 
                                }
                            }
                            
                            $sql=mysqli_query($conn,"INSERT INTO `chitietdachang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES ".$string.";");
                            // var_dump($sql);exit;
                            if($sql){
                                echo"<script language='javascript'>
                                        alert('Đặt hàng thành công! Sản phẩm sẽ được giao trong vòng 3 ngày !');
                                    </script>";
                                unset($_SESSION['cart']);
                            }
                        }
                    break;
                }
            }
            }  
            if(!empty($_SESSION["cart"])){
                $product = mysqli_query($conn,"SELECT * FROM hanghoa WHERE mshh IN (".implode(",", array_keys($_SESSION["cart"])).")");
            }
        ?>
            <div class="app">
            <?php
    include 'conn.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $user=((isset($_SESSION['user'])) ? $_SESSION['user']:[]);
    // or $user=$_SESSION['user];
?>
<header class="header">
    <div class="grid">
        <nav class="header__nav">
            <div class="header__nav-logo">
                <a href="index.php"><img src="../logo/logo1.png" alt="LOGO"></a>
            </div>
            <ul class="header__nav-list">
                <i class="header__nav-list-item-cart fas fa-cart-arrow-down"></i>
                <a href="./cart.php" class="header__nav-list-item-link">
                    <li class="header__nav-list-item">Giỏ Hàng</li>
                </a>
                <i class="header__nav-list-item-cart fas fa-user"></i>
                <?php if(isset($user['HoTenKH'])){?>
                <div class="header__nav-user">Tài Khoản
                    <div class="header__nav-list-user">
                        <ul>
                            <li style="color:black;cursor:pointer;">
                                <i class="fas fa-user-shield"></i>
                                <?php echo $user['HoTenKH']?>
                            </li>
                            <li><a href="./logout.php">Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
                <?php }else{?>
                <div class="header__nav-user">Tài Khoản
                    <div class="header__nav-list-user">
                        <ul>
                            <li><a href="./dangky.php">Đăng Ký</a></li>
                            <li><a href="./dangnhap.php">Đăng Nhập</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
            
<div class="header-with-search">
    <ul class="header-list-infomation">
        <a class="header-list-item-link" href="index.php">
            <li class="header-list-item">Trang Chủ</li>
        </a>
        <a class="header-list-item-link" href="">
            <li class="header-list-item">Giới Thiệu</li>
        </a>
        <li class="header-list-item">Liên Hệ Hỗ Trợ</li>
        <a class="header-list-item-link" href="https://www.facebook.com/van.nguyen1508" target="_blank">
            <i class="fab fa-facebook"></i>
        </a>
        <a class="header-list-item-link" href="">
            <i class="header-list-item-icon fab fa-instagram"></i>
        </a>
    </ul>
    <div class="header__search">
        <form class="header__search-search" action="" method="get">
        <input class="input" type="search" name="search" placeholder="Bạn muốn tìm gì ?">

        <!-- <i class="header__search-icon fas fa-search"></i> -->
        </form>
        <div class="header__search-history">
            <span class="header__search-history-heading">
                           Lịch sử tìm kiếm 
                        </span>
            <ul class="header__search-list">
                <li class="header__search-item">
                    iPhone 11 Pro Max
                </li>
                <li class="header__search-item">
                    SamSung galaxy note20
                </li>
                <li class="header__search-item">
                    Xiaomi redmi note 10
                </li>
            </ul>
        </div>
    </div>
</div>

            <div class="container">
             
         <?php   if(!empty($product)){?>
                <form action="cart.php?action=submit" method="post">
                <div class="grid">
                    <div class="cart-name">Giỏ Hàng</div>
                    <div class="content">
                        <div class="content__product">Sản Phẩm</div>
                        <div class="content__price">
                            <span>Đơn Giá</span>
                            <span>Số Lượng</span>
                            <span>Thành Tiền</span>
                            <span>Thao Tác</span>
                        </div>
                    </div>
                    <?php 
                        if(!empty($_SESSION['cart'])){ 
                            $total=0;
                            $sl="SELECT * FROM hanghoa WHERE MSHH IN(".implode(",",array_keys($_SESSION["cart"])).")";
                            $rs=mysqli_query($conn,$sl);
                            while($row=mysqli_fetch_array($rs)){ ?>
                                <div class="cart__detail">
                                    <div class="product">
                                        <img width="100" height="100" src="<?=$row["Images"]?>" alt="Điện thoại">
                                        <div class="product__name">
                                            <span><?=$row["TenHH"]?></span>
                                        </div>
                                    </div>
                                    <div class="cart__price">
                                        <span><?=number_format($row["Gia"])." VND"?></span>
                                        <input class="cart__price-mg" type="text" size="1" value="<?=$_SESSION['cart'][$row["MSHH"]]?>" name="amount[<?=$row["MSHH"]?>]">
                                        <span><?=number_format($row["Gia"] *$_SESSION['cart'][$row["MSHH"]])." VND" ?></span>
                                        <div class="btn_del">
                                            <a class="btn btn--primary btn-input" style="text-decoration: none;color:#fff;display:block;" href="cart.php?action=delete&id=<?=$row["MSHH"]?>">Xóa</a>
                                        </div>
                                        <input class="btn btn--primary btn-input" type="submit" value="Cập Nhật" name="update_order">
                                    </div>  
                                </div> 
                            <?php $total +=$row["Gia"] *$_SESSION['cart'][$row["MSHH"]]; } ?>
                            <div class="total">
                                <span class="total-label">Tổng Thanh Toán: <?=number_format($total)." VND"?></span>
                            </div>
                            <!-- <div class="info">
                                <span class="error"></span>
                                <div class="form-group">
                                    <label for="name">Họ tên người nhận:</label>
                                    <input type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Số điện thoại người nhận:</label>
                                    <input type="text" name="phone" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ người nhận:</label>
                                    <input type="text" name="address">
                                </div>
                                <input class="btn btn--primary btn-r" type="submit" value="Mua Ngay" name="order">
                            </div> -->
                            <input class="btn btn--primary btn-r" type="submit" value="Mua Ngay" name="order">
                    <?php }   ?>
                </form>
                <?php } else{?>
                    <div class="wrap">
                <div class="cart">
                    <i class="cart__icon fas fa-shopping-cart"></i>
                    <p class="cart__mess">Không có sản phẩm nào trong giỏ hàng</p>
                    <a href="./index.php"><button class="btn btn--primary btn--size">VỀ TRANG CHỦ</button></a>
                </div> 
            </div> 
            <?php }?>
            </div>
        </div>
        
    </body>


    </html>




