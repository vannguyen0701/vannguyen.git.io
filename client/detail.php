<?php 
    include 'conn.php';
    $sl="SELECT * FROM hanghoa WHERE MSHH='$_GET[id]'";
    $rs=mysqli_query($conn,$sl);
    $row=mysqli_fetch_array($rs);
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
    <title><?=$row["TenHH"]?></title>
    <style>
        .container{
            background-color: #fff ;
        }
       .info-name{
            font-weight: 500;
            padding-bottom: 20px;
            margin-left: 20px;
       }
       .container__detail{
           margin-left: 20px;
       }
       .speci{
           font-size: 1.4rem;
            margin: 10px;
       }
       .container_speci{
            border: 1px dashed #dbdbdb;
            border-radius: 2px;
            margin-top: 56px;
       }
       .info-promotion{
            border: 1px dashed var(--border-color);
       }
       .info-detail{
            border: 1px dashed var(--border-color);
       }
       .wrap--format form label{
            font-size: 1.4rem;
            color: var(--text-color);
       }
       .wrap--format form input{
            outline: none;
            padding: 2px;
            text-align: center;
       }
       .format-btn {
            font-size: 1.5rem;
            align-items: center;
            margin-top: 20px;
            margin-left: 5px;
            line-height: 30px;
            width: 80% !important;
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
                    <li class="header__nav-list-item">Gi??? H??ng</li>
                </a>
                <i class="header__nav-list-item-cart fas fa-user"></i>
                <?php if(isset($user['HoTenKH'])){?>
                <div class="header__nav-user">T??i Kho???n
                    <div class="header__nav-list-user">
                        <ul>
                            <li style="color:black;cursor:pointer;">
                                <i class="fas fa-user-shield"></i>
                                <?php echo $user['HoTenKH']?>
                            </li>
                            <li><a href="./logout.php">????ng Xu???t</a></li>
                        </ul>
                    </div>
                </div>
                <?php }else{?>
                <div class="header__nav-user">T??i Kho???n
                    <div class="header__nav-list-user">
                        <ul>
                            <li><a href="./dangky.php">????ng K??</a></li>
                            <li><a href="./dangnhap.php">????ng Nh???p</a></li>
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
            <li class="header-list-item">Trang Ch???</li>
        </a>
        <a class="header-list-item-link" href="">
            <li class="header-list-item">Gi???i Thi???u</li>
        </a>
        <li class="header-list-item">Li??n H??? H??? Tr???</li>
        <a class="header-list-item-link" href="https://www.facebook.com/van.nguyen1508" target="_blank">
            <i class="fab fa-facebook"></i>
        </a>
        <a class="header-list-item-link" href="">
            <i class="header-list-item-icon fab fa-instagram"></i>
        </a>
    </ul>
    <div class="header__search">
        <form class="header__search-search" action="" method="get">
        <input class="input" type="search" name="search" placeholder="B???n mu???n t??m g?? ?">

        <!-- <i class="header__search-icon fas fa-search"></i> -->
        </form>
        <div class="header__search-history">
            <span class="header__search-history-heading">
                           L???ch s??? t??m ki???m 
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
            <div class="grid">
                <span class="info__heading">Chi ti???t s???n ph???m</span>
                <div class="wrap-info">
                    <div class="grid__row">
                        <div class="grid__column-3">
                            <div class="infoproduct">
                                <img width="400" height="400" src="<?=$row["Images"]?>" alt="">
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="container__detail">
                                <h1 class="info-name"><?=$row["TenHH"]?></h1>
                                <span class="info-price">Gi??: <?=number_format($row["Gia"],0,",")." VND"?></span>
                                <div class="info-promotion">
                                    <p class="info-kb">
                                        KHUY???N M??I
                                    </p>
                                    <p class="info-kb">
                                        C?? h???i tr??ng xe khi mua h??ng tr??? ti???n m???t
                                    </p>
                                </div>
                                <ul class="info-detail">
                                    <li class="info-item">S???n ph???m bao g??m: H???p, s??ch h?????ng d???n, c??y l???y sim, ???p l??ng, c??p s???c</li>
                                    <li class="info-item">B???o h??nh ch??nh h??ng 12 th??ng</li>
                                    <li class="info-item">1 ?????i 1 trong 30 ng??y v???i s???n ph???m l???i</li>
                                </ul>
                                <div class="wrap--format">
                                    <form action="cart.php?action=add" method="post">
                                        <label for="">S??? L?????ng:</label>
                                        <input type="text" value="1" size="1" name="amount[<?=$row['MSHH']?>]">
                                        <label for="">C??n l???i: <?=$row['SoLuongHang']?></label>
                                        <input class="btn btn--primary format-btn" type="submit" value="Th??m V??o Gi??? H??ng">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <h1 style="text-align:center;font-weight:500;margin-bottom:10px;">Th??ng s??? k??? thu???t</h1>
                            <div class="container_speci">
                                <div class="speci">
                                    <span><?=$row["GhiChu"]?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
    <div class="footer__border"></div>
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-5">
                <span class="footer__heading">CH??M S??C KH??CH H??NG</span>
                <ul class="footer__list">
                    <a href="" class="footer__list-item-link">
                        <li class="footer__list-item">Trung t??m tr??? gi??p</li>
                        <li class="footer__list-item">Vshop mail</li>
                        <li class="footer__list-item">H?????ng d???n mua h??ng</li>
                        <li class="footer__list-item">Thanh to??n</li>
                        <li class="footer__list-item">Ch??m s??c kh??ch h??ng</li>
                        <li class="footer__list-item">Ch??nh s??ch b???o h??nh</li>
                    </a>
                </ul>
            </div>
            <div class="grid__column-5">
                <span class="footer__heading">VSHOP</span>
                <ul class="footer__list">
                    <a href="" class="footer__list-item-link">
                        <li class="footer__list-item">Gi???i thi???u v??? VShop</li>
                        <li class="footer__list-item">??i???u kho???n Vshop</li>
                        <li class="footer__list-item">Ch??nh s??ch b???o m???t</li>
                        <li class="footer__list-item">Ch??nh h??ng</li>
                        <li class="footer__list-item">Flash sales</li>
                        <li class="footer__list-item">Li??n h??? v???i truy???n th??ng</li>
                    </a>
                </ul>
            </div>
            <div class="grid__column-5">
                <span class="footer__heading">THANH TO??N</span>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <img class="footer__list-item-img" src="../logo/airpay.png" alt="">
                    </li>
                    <li class="footer__list-item">
                        <img class="footer__list-item-img" src="../logo/mastercart.png" alt="">
                    </li>
                    <li class="footer__list-item">
                        <img class="footer__list-item-img" src="../logo/tragop.jpg" alt="">
                    </li>
                    <li class="footer__list-item ">
                        <img class="footer__list-item-img " src="../logo/visa.jpg " alt=" ">
                    </li>
                    <li class="footer__list-item ">
                        <img class="footer__list-item-img " src="../logo/agribank-logo.png " alt=" ">
                    </li>
                    <li class="footer__list-item ">
                        <img class="footer__list-item-img " src="../logo/sacom.jpeg " alt=" ">
                    </li>
                    <li class="footer__list-item ">
                        <img class="footer__list-item-img " src="../logo/vietcom.jpg " alt=" ">
                    </li>
                </ul>
            </div>
            <div class="grid__column-5 ">
                <span class="footer__heading ">THEO GI???I CH??NG T??I TR??N</span>
                <div class="footer__follow">
                    <i class="footer__follow-icon fab fa-facebook"></i>
                    <a class="footer__follow-link" href="">Facebook</a>
                </div>
                <div class="footer__follow">
                    <i class="footer__follow-icon fab fa-instagram-square"></i>
                    <a class="footer__follow-link" href="">Instagram</a>
                </div>
                <div class="footer__follow">
                    <i class="footer__follow-icon fab fa-twitter"></i>
                    <a class="footer__follow-link" href="">Twitter</a>
                </div>
            </div>
            <div class="grid__column-5 ">
                <span class="footer__heading ">T???I ???NG D???NG VSHOP</span>
                <div class="footer__appdownload">
                    <div class="footer__qr">
                        <a href=""><img class="footer__qr-code" src="../logo/qrcode.png" alt=""></a>
                    </div>
                    <div class="footer__app">
                        <a href="https://play.google.com/store?utm_source=apac_med&utm_medium=hasem&utm_content=Apr0121&utm_campaign=Evergreen&pcampaignid=MKT-EDR-apac-vn-1003227-med-hasem-py-Evergreen-Apr0121-Text_Search_BKWS-BKWS%7cONSEM_kwid_43700055535927309_creativeid_446323003325_device_c&gclid=CjwKCAjwx6WDBhBQEiwA_dP8reowDuR_qW-JBCjppXExSAzEYAXSXk-uQRRv7u4ieQdJwvaGjkV8yxoCL3kQAvD_BwE&gclsrc=aw.ds">
                            <img class="footer__app-img" src="../logo/googleplay.png" alt="">
                        </a>
                        <a href="https://www.apple.com/app-store/">
                            <img class="footer__app-img" src="../logo/appstores.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>