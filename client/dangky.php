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
    <title>Đăng ký</title>
    <style>
        .error_msg{
            color: red;
            font-size: 1.4rem;
            margin-top: 5px;
            display: block;
            margin-left: 2px;
        }       
        .form__input {
            width: 100%;
            height: 40px;
            margin-top: 16px;
            padding: 0px 12px;
            font-size: 1.4rem;
            border: 1px solid rgb(214, 214, 214);
            border-radius: 4px;
            outline-color: var(--border-color);
        }
        .form__input:hover {
            border-color: #1dbfaf;
        }
        .btn {
            outline: none;
            height: 33px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            line-height: 33px;
        }
        .heading{
            display: block;
            font-size: 2.4rem;
            text-align: center;
            padding: 10px;
        }
        .auth__form{
            background-color: var(--white-color);
        }
    </style>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__nav">
                    <div class="header__nav-logo">
                        <a href="index.php"><img src="../logo/Logo1.png" alt="LOGO"></a>
                        <span class="header__register">Đăng Ký</span>
                    </div>  
                </nav>
            </div>
        </header>
        <!-- Đăng ký -->
        <div class="msg">
            <?php
            include 'conn.php';
                $msg=[];
                if(isset($_POST['dangki'])){
                    $fname=$_POST['fname'];
                    $mail=$_POST['mail'];
                    $phone=$_POST['phone'];
                    $address=$_POST['address'];
                    $pw=$_POST['pw'];
                    $repw=$_POST['repw'];
                    if(empty($fname)){
                        $msg['fname']='Vui lòng nhập họ tên!';
                    }
                    if(empty($mail)){
                        $msg['mail']='Vui lòng nhập Email!';
                    }
                    if(empty($phone)){
                        $msg['phone']='Vui lòng nhập số điện thoại!';
                    }
                    if(empty($address)){
                        $msg['address']='Vui lòng nhập địa chỉ!';
                    }
                    if(empty($pw)){
                        $msg['pw']='Vui lòng nhập mật khẩu!';
                    }
                    if($pw != $repw){
                        $msg['repw']='Nhập lại mật khẩu không chính xác!';
                    }
                    // Input không rỗng
                    if(empty($msg)){
                        if(strlen($pw) < 8 || strlen($pw) > 16){
                            $msg['checkpw']='Mật khẩu phải từ 8 đến 16 ký tự!';
                        }elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            $msg['checkmail'] = "Email phải có dạng @gmail.com";
                            }else{
                            $hpw=md5($pw);
                            $sl="SELECT * FROM khachhang WHERE Email='$mail'";
                            $rs=mysqli_query($conn,$sl);
                            if(mysqli_num_rows($rs)==0){
                                $is="INSERT INTO `khachhang`(`HoTenKH`,`DiaChi`,`SoDienThoai`,`Email`,`MatKhau`) VALUES('$fname','$address','$phone','$mail','$hpw')";
                                mysqli_query($conn,$is);
                                echo '<script>
                                        alert("Đăng ký thành công");
                                    </script>';
                            }else{
                                echo '<div class="msg_warning">Mail đã tồn tại!</div>';
                            }

                        }
                    }
                    
                    mysqli_close($conn);
                    
                }
            ?>
        </div>
        <form action="" method="POST">
            <div class="auth__form">
            <p class="heading">Đăng ký tài khoản</p>
                <div class="auth__container">
                    <div class="form-group">
                        <input class="form__input" type="text" name="fname" id="fname" placeholder="Nhập tên đầy tên đủ của bạn" onkeyup="checkname();"autocomplete="off">
                        <span class="error_msg"><?=(isset($msg['fname']))?$msg['fname']:''?></span>
                        <input class="form__input" type="text" name="mail" id="mail" placeholder="@gmail.com" autocomplete="off">
                        <span class="error_msg"><?=(isset($msg['mail']))?$msg['mail']:''?></span>
                        <span class="error_msg"><?=(isset($msg['checkmail']))?$msg['checkmail']:''?></span>
                        <input class="form__input" type="text" name="phone" id="phone" placeholder="Nhập số điện thoại của bạn" onkeyup="checkphone();"autocomplete="off">
                        <span class="error_msg"><?=(isset($msg['phone']))?$msg['phone']:''?></span>
                        <input class="form__input" type="text" name="address" id="name" placeholder="Địa chỉ của bạn" onkeyup="checkname();"autocomplete="off">
                        <span class="error_msg"><?=(isset($msg['address']))?$msg['address']:''?></span>
                        <input class="form__input" type="password" name="pw" id="pw" placeholder="Nhập mật khẩu của bạn" onkeyup="checkpw();">
                        <span class="error_msg"><?=(isset($msg['checkpw']))?$msg['checkpw']:''?></span>
                        <span class="error_msg"><?=(isset($msg['pw']))?$msg['pw']:''?></span>
                        <input class="form__input" type="password" name="repw" id="repw" placeholder="Nhập lại mật khẩu của bạn" onkeyup=" checkpw();">
                        <span class="error_msg"><?=(isset($msg['repw']))?$msg['repw']:''?></span>
                    </div>
                    <div class="auth-form__aside">
                        <p class="auth-form__policy">
                            Bạn đã có tài khoản ?
                            <a href="dangnhap.php" class="auth-form__text-link ">Đăng nhập ngay</a>
                        </p>
                    </div>
                    <div class="auth-form__controls ">
                        <button onclick="checkmail();" class="btn btn--primary" name="dangki">ĐĂNG KÝ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/xulyform.js"></script>
</body>

</html>