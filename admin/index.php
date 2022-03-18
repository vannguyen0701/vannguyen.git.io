<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}
    if(!isset($_SESSION['admin'])){
        header("location: login.php");
    }
?>
    <?php 
    $admin=(isset($_SESSION['admin'])?$_SESSION['admin']:[]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="../font/css/all.min.css" rel="stylesheet">
    <title>Admin</title>
    <style>
        .header {
            height: 50px;
            background-color: rgba(0, 0, 0, 0.7);
            width: 100%;
        }
        
        .header-item {
            display: flex;
            justify-content: space-between;
        }
        
        .header-item p {
            display: block;
            font-size: 1.4rem;
            color: #fff;
            line-height: 50px;
        }
        
        .header-item a {
            text-decoration: none;
            font-size: 1.4rem;
            display: block;
            line-height: 50px;
            color: #fff;
        }
        
        .icon {
            margin-right: 5px;
        }
        
        .container {
            margin-top: 20px;
            width: 100%;
        }
        
        .category {
            border: 1px solid var(--border-color);
            border-radius: 8px;
        }
        
        .product__heading p {
            font-size: 2rem;
            padding: 15px;
            display: block;
            color: var(--white-color);
            background-color: rgba(0, 0, 0, 0.7);
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            text-align: center;
        }
        
        table,
        td {
            border: 1px solid var(--border-color);
            border-collapse: collapse;
            text-align: center;
            font-size: 1.5rem;
            padding: 15px 0;
        }
        
        th {
            padding: 10px;
            font-size: 1.8rem;
            line-height: 20px;
        }
        
        .grid_admin {
            width: 1300px;
            max-width: 100%;
            margin: 0 auto;
        }
        
        .product-link {
            background-color: rgba(0, 0, 0, 0.6);
            color: var(--white-color);
            padding: 8px;
            display: inline;
            border-radius: 4px;
        }
        
        .product-link:hover {
            background-color: rgba(0, 0, 0, 0.75);
        }
        
        /* .category__list {
            position: relative;
        }
        
        .category__list::after {
            position: absolute;
            content: '';
            top: 8px;
            left: 4px;
            border: 8px solid;
            border-color: transparent transparent transparent rgba(0, 0, 0, 0.75);
        }
         */
        .category__list-item {
            padding-left: 20px;
    
        }
     
        .category__list-item a{
            display: block;
            right: 0;
            transition: right linear 0.1s;
            position: relative;
        }
        
        .category__list-item a:hover {
            right: -2px;
            color: var(--primary-color);
        }
        
        .active {
            color: var(--primary-color);
        }
        
        .index {
            display: flex;
        }
        
        .index-link {
            margin-right: 15px;
        }
        .btn-back{
            display: block;
            margin: 10px 0 10px 0;
            font-size: 1.4rem;
            line-height: 33px;
            width: 80px !important;
            justify-content: flex-end;
            float: right;
        }
        /* style="background-image: url(../images/bg.jpg);background-size:cover;" */
    </style>
</head>

<body>
    <div class="header">
        <div class="grid">
            <header class="header-item">
                <?php if(isset($admin['HoTenNV'])) { ?>
                <p>Xin chào:
                    <?=$admin['HoTenNV']?>
                </p>
                <div class="index">
                    <a class="index-link" href="index.php">Trang chủ</a>
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt icon"></i>Đăng xuất</a>
                </div>
                <?php } ?>
            </header>
        </div>
    </div>
<?php include'config/db.php'; ?>
    <?php 
        if(isset($_GET['action'])){
            switch($_GET['action']){
                case'delete';
                require_once './product/del.php';
                break;
                
                case'update';
                require_once './product/update.php';
                break;

                case'add';
                require_once './product/add.php';
                break;
                
                case'viewproduct';
                require_once './product/listproduct.php';
                break;

                case'viewcustomer';
                require_once './product/khachhang.php';
                break;

                case'order';
                require_once './product/order.php';
                break;
                
                case'orderview';
                require_once './product/view.php';
                break;

            }
        }else{
            require_once './product/listproduct.php';
        }
    ?>

</body>

</html>