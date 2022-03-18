<style>
    .home-product-item__img--with {
        transition: transform linear 0.2s;
        will-change: tranform;
        width: 100%;
        overflow: hidden;
        margin-top: 30px;
    }

    .home-product-item__img--with:hover {
        transform: translateY(-5px);
    }
</style>
<ul class="category">
    <li class="category__item"><a href="index.php">TẤT CẢ</a> </li>
<?php
    include 'conn.php';
    $select="SELECT * FROM loaihanghoa";
    $rs=mysqli_query($conn,$select);
    while($row = mysqli_fetch_array($rs)){
?>
    <li class="category__item">
        <a href="index.php?view=product&id=<?=$row["MaLoaiHang"]?>"><?=$row["TenLoaiHang"]?></a>
    </li>   
<?php
    }
?>
</ul>       
