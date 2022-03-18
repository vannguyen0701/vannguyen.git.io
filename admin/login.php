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
    <title>Admin Login</title>
    <style>
        .form__input {
            border-radius: 0 !important;
            background: none;
            height: 45px;
            outline: none;
            border-color: var(--white-color);
            color: var(--white-color);
            font-size: 1.5rem;
        }
        
        .btn {
            width: 90%;
        }
        
        .auth-form__controls-login {
            margin: 20px 0 10px 38px;
        }
        
        .form__msg {
            text-align: center;
        }
        
        .form__msg span {
            font-size: 1.4rem;
            color: var(--text-color);
        }
        
        .form__msg span a {
            text-decoration: none;
            color: #fb5533;
        }
        
        .auth__form {
            transform: translateY(50%);
            background-color: rgba(171, 119, 157, 0.5);
            width: 450px;
        }
        
        .auth__form p {
            display: block;
            font-size: 2.5rem;
            text-align: center;
            color: #8b5c7e;
        }
        
        .btn-format {
            background-color: #f0bcb4 !important;
            border-radius: 0;
            font-size: 1.5rem;
            color: #fff;
        }
        
        .remember {
            margin-top: 15px;
            display: flex;
            align-items: center;
        }
        
        .label {
            font-size: 1.4rem;
            color: #fff;
            margin-left: 5px;
            margin-top: 1px;
        }
    </style>
</head>

<body style="background-image: url(../images/bg.jpg);background-size:cover;">
    <div class="app">
        <!-- Đăng nhập -->
            <div class="auth__form">
                <form action="" method="POST">
                <p>ĐĂNG NHẬP </p>
                <div class="msg">
                    <?php session_start();?>
                    <?php   
                        include './config/db.php';
                        if(isset($_POST['login'])){
                            $user=$_POST['phone'];
                            $pw=$_POST['pw'];
                            // $mdpw=md5($pw);
                            $sl="SELECT * FROM nhanvien WHERE User='$user'";
                            $rs=mysqli_query($conn,$sl);
                            $row=mysqli_fetch_array($rs);
                            $checkusser=mysqli_num_rows($rs);
                            if($checkusser==1){
                                // $checkpw=password_verify($pw,$row['MatKhau'])
                                // var_dump($checkpw);exit;
                                if($row['MatKhau']==$pw){
                                    $_SESSION['admin']=$row;
                                    header('location: index.php');
                                }else{
                                    echo '<div class="msg_warning">Incorrect password!</div>' ;
                                }
                                if(isset($_POST['remember'])){
                                    setcookie("name",$user,time()+ (10 * 365 * 24 * 60 * 60));
                                    setcookie("password",$pw,time()+ (10 * 365 * 24 * 60 * 60));
                                }else{
                                    if(isset($_COOKIE['name'])){
                                        setcookie("name","");
                                    }
                                    if(isset($_COOKIE['password'])){
                                        setcookie("password","");
                                    }
                                }
                            }else{
                                    echo '<div class="msg_warning">Username does not exist!</div>';
                            }
                        }
                    ?>
                </div>
                <div class="auth__container">
                    <div class="form-group">
                        <input class="form__input" type="text" name="phone" placeholder="Username" value="<?=(isset($_COOKIE['name'])?$_COOKIE['name']:'')?>" autocomplete="off">
                        <input class="form__input" type="password" name="pw" placeholder="Password" value="<?=(isset($_COOKIE['password'])?$_COOKIE['password']:'')?>" autocomplete="off">
                        <div class="remember">
                            <input type="checkbox" name="remember" <?php if(isset($_COOKIE[ "name"])) { ?> checked
                            <?php } ?>>
                            <label class="label" for="">Lưu tài khoản</label>
                        </div>
                    </div>
                    <div class="auth-form__controls-login">
                        <button class="btn btn-format" name="login">ĐĂNG NHẬP</button>
                    </div>
                </div>
                 </form>
            </div>
    </div>

</body>

</html>