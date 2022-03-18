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
    <title>Đăng Nhập</title>
    <style>
         .form__input {
            border-radius: 4px;
        }
        .btn {
            width: 90%;
        }
        .auth-form__controls-login {
            margin-left: 34px;
        }
        .form__msg{
            margin-top: 10px;
            text-align: center;
        }
        .form__msg span{
            font-size: 1.4rem;
            color: var(--text-color);
        }
        .form__msg span a{
            text-decoration: none;
            color: #fb5533;
        }
        .checkbox{
            margin: 20px 0;
        }
        .remember{
            font-size: 1.4rem;
            color: var(--text-color);
            margin-left: 5px;
            display: inline-block;
        }
        .auth__form{
            background-color: var(--white-color);
        }
        .heading{
            display: block;
            font-size: 2.4rem;
            text-align: center;
            padding: 10px;
        }
        .msg_warning{
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__nav">
                    <div class="header__nav-logo">
                        <a href="index.php"><img src="../logo/logo1.png" alt="LOGO"></a>
                    </div>
                </nav>
            </div>
        </header>
        <div class="msg">
            <?php session_start();?>
            <?php   
                include 'conn.php';
                if(isset($_POST['login'])){
                    $mail=$_POST['mail'];
                    $pw=$_POST['pw'];
                    $mdpw=md5($pw);
                    $sl="SELECT * FROM khachhang WHERE Email='$mail'";
                    $rs=mysqli_query($conn,$sl);
                    $row=mysqli_fetch_array($rs);
                    $checkmail=mysqli_num_rows($rs);
                    if($checkmail==1){
                        // $checkpw=password_verify($pw,$row['MatKhau']);
                        // var_dump($checkpw);exit;
                        if($row['MatKhau']==$mdpw){
                            $_SESSION['user']=$row;
                            header('location: index.php');
                        }else{
                            echo '<div class="msg_warning">Sai mật khẩu!</div>';
                        }
                        if(!empty($_POST['remember'])){
                            setcookie("member_login",$mail,time()+ (10 * 365 * 24 * 60 * 60));
                            setcookie("member_password",$pw,time()+ (10 * 365 * 24 * 60 * 60));
                        }else{
                            if(isset($_COOKIE['member_login'])){
                                setcookie("member_login","");
                            }
                            if(isset($_COOKIE['member_password'])){
                                setcookie("member_password","");
                            }
                        }
                    }else{
                            echo '<div class="msg_warning">Email không tồn tại!</div>';
                    }
                }
            ?>
        </div>
        <!-- Đăng nhập -->
        <form action="" method="POST">
            <div class="auth__form" id="lg">
                <p class="heading">Đăng Nhập</p>
                <div class="auth__container">
                    <div class="form-group">
                        <input class="form__input" type="text" name="mail" placeholder="Nhập email của bạn" value="<?=(isset($_COOKIE['member_login'])?$_COOKIE['member_login']:'') ?>">
                        <input class="form__input" type="password" name="pw" placeholder="Nhập mật khẩu của bạn" value="<?=(isset($_COOKIE['member_password'])?$_COOKIE['member_password']:'') ?>">
                        <input class="checkbox" type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> >
                        <span class="remember" >Remember Me</span>
                    </div>
                    <div class="auth-form__controls-login">
                        <button class="btn btn--primary" name="login">ĐĂNG NHẬP</button>
                    </div>
                    <div class="form__msg">
                        <span>Bạn chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></span>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>