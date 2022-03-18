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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <title>Vshop</title>
    <style>
        .header__nav-list-user::after {
            position: absolute;
            content: "";
            top: -13px;
            right: 0;
            width: 100%;
            height: 15px;
        }

        .header__search-search input{
                height: 100%;
                width: 100%;
                font-size: 1.4rem;
                border: none;
                border-radius: 2px;
                outline: none;
                overflow: hidden;
        }
 
    </style>

</head>

<body>
    <?php include 'conn.php'?>
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
        <input type="search" name="search" placeholder="Bạn muốn tìm gì ?">

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
            <div class="grid">
            <div class="slideshow">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/830-300-830x300-2.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="../img/euro-oppo-830-300-830x300.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="../img/euro-samsung-830-300-830x300.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="../img/hotsale-830-300-830x300-1.png" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
    </div>
    <div class="slideshow__news">
        <div class="slideshow__news-heading">
            <span>Tin tức công nghệ</span>
        </div>
        <div class="slideshow__news-tecno">
            <a class="slideshow__news-link" href="https://www.thegioididong.com/tin-tuc/tong-hop-lai-cac-flagship-android-tu-dau-nam-2021-1341755">
                <img height="60" width="100" src="../img//ssnote20.jpg" alt="" class="slideshow__img">
                <h3 class="slideshow-heading">Tổng hợp các flagship Android được ra mắt tại nước ta từ đầu năm 2021</h3>
            </a>
        </div>
        <div class="slideshow__news-tecno">
            <a class="slideshow__news-link" href="https://www.thegioididong.com/tin-tuc/tong-hop-lai-cac-flagship-android-tu-dau-nam-2021-1341755">
                <img height="60" width="100" src="../img//ssnote20.jpg" alt="" class="slideshow__img">
                <h3 class="slideshow-heading">Tổng hợp các flagship Android được ra mắt tại nước ta từ đầu năm 2021</h3>
            </a>
        </div>
        <div class="slideshow__news-tecno">
            <a class="slideshow__news-link" href="https://www.thegioididong.com/tin-tuc/tong-hop-lai-cac-flagship-android-tu-dau-nam-2021-1341755">
                <img height="60" width="100" src="../img//ssnote20.jpg" alt="" class="slideshow__img">
                <h3 class="slideshow-heading">Tổng hợp các flagship Android được ra mắt tại nước ta từ đầu năm 2021</h3>
            </a>
        </div>
    </div>
</div>
                    <div class="home-product__label">
                            ĐIỆN THOẠI NỔI BẬT NHẤT
                    </div>
                <?php require_once("category.php")?>
                <?php require_once("product.php")?>
            </div>
        </div>
        <div class="modal" id="modal">
            <div class="modal__overlay"></div>
            <div class="modal__body ">
                <!-- Đăng ký -->
                <form action="./register.php" method="POST">
                    <div class="auth__form" id="rt">
                        <div class="auth__container">
                            <div class="auth-icon" id="close1">
                                <i class="auth__form-icon fas fa-times "></i>
                            </div>
                            <div class="auth__form-heading">
                                <span>Đăng Ký Thành Viên</span>
                            </div>
                            <div class="form-group">
                                <input class="form__input" type="text" name="name" id="name" placeholder="Nhập tên đầy đủ của bạn">
                                <input class="form__input" type="text" name="mail" id="mail" placeholder="@gmail.com">
                                <!-- <input class="form__input" type="text" name="username" id="username" placeholder="Nhập tài khoản của bạn"> -->
                                <input class="form__input" type="password" name="pw" id="pw" placeholder="Nhập mật khẩu của bạn">
                                <input class="form__input" type="password" name="repw" id="repw" placeholder="Nhập lại mật khẩu của bạn">
                            </div>
                            <div class="auth-form__aside">
                                <p class="auth-form__policy">
                                    Bằng việc đăng ký, bạn đã đồng ý với VSHOP về
                                    <a href="" class="auth-form__text-link ">Điều khoảng dịch vụ</a> &
                                    <a href="" class="auth-form__text-link ">Chính sách bảo mật</a>
                                </p>
                            </div>
                            <div class="auth-form__controls ">
                                <button onclick="check();" class="btn btn--primary ">ĐĂNG KÝ</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Đăng nhập -->
                <form action="" method="POST">
                    <div class="auth__form" id="lg">
                        <div class="auth__container">
                            <div class="auth-icon " id="close2">
                                <i class="auth__form-icon fas fa-times "></i>
                            </div>

                            <div class="auth__form-heading ">
                                <span>Đăng Nhập</span>
                            </div>
                            <div class="form-group ">
                                <input class="form__input" type="text" name="mail" id="mail" placeholder="Nhập email của bạn">
                                <input class="form__input" type="password" name="pw" id="pw" placeholder="Nhập mật khẩu của bạn ">
                            </div>
                            <div class="auth__form-password ">
                                <span class="auth__form-forget ">Bạn quên mật khẩu ?</span>
                                <span class="auth__form-help ">Bạn cần trợ giúp ?</span>
                            </div>
                            <div class="auth-form__controls-login ">
                                <button onclick="check();" class="btn btn--primary ">ĐĂNG NHẬP</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- <script src="../js/form.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <div class="footer">
    <div class="footer__border"></div>
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-5">
                <span class="footer__heading">CHĂM SÓC KHÁCH HÀNG</span>
                <ul class="footer__list">
                    <a href="" class="footer__list-item-link">
                        <li class="footer__list-item">Trung tâm trợ giúp</li>
                        <li class="footer__list-item">Vshop mail</li>
                        <li class="footer__list-item">Hướng dẫn mua hàng</li>
                        <li class="footer__list-item">Thanh toán</li>
                        <li class="footer__list-item">Chăm sóc khách hàng</li>
                        <li class="footer__list-item">Chính sách bảo hành</li>
                    </a>
                </ul>
            </div>
            <div class="grid__column-5">
                <span class="footer__heading">VSHOP</span>
                <ul class="footer__list">
                    <a href="" class="footer__list-item-link">
                        <li class="footer__list-item">Giới thiệu về VShop</li>
                        <li class="footer__list-item">Điều khoản Vshop</li>
                        <li class="footer__list-item">Chính sách bảo mật</li>
                        <li class="footer__list-item">Chính hãng</li>
                        <li class="footer__list-item">Flash sales</li>
                        <li class="footer__list-item">Liên hệ với truyền thông</li>
                    </a>
                </ul>
            </div>
            <div class="grid__column-5">
                <span class="footer__heading">THANH TOÁN</span>
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
                <span class="footer__heading ">THEO GIỎI CHÚNG TÔI TRÊN</span>
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
                <span class="footer__heading ">TẢI ỨNG DỤNG VSHOP</span>
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
</body>

</html>