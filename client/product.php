<style>
    .home-product__safe-off-percent{
        display: block;
        line-height: 38px;
        color: var(--text-color);
        font-weight: 400;
        margin-left: 4px;
    }
</style>
<div class="grid__row">
    <?php 
        if(isset($_GET['id'])){
            $query="SELECT * FROM hanghoa,LoaiHangHoa WHERE hanghoa.MaLoaiHang=LoaiHangHoa.MaLoaiHang AND
            hanghoa.MaLoaiHang='$_GET[id]' ORDER BY hanghoa.MSHH ASC";
            $category=mysqli_query($conn,$query);
        } 
    ?>
    <?php 
        $sl="SELECT * FROM hanghoa";
        $rs=mysqli_query($conn,$sl);
    ?>  
        <?php 
            if (empty($_GET['id'])){?>  
            <?php 
                while($show = mysqli_fetch_array($rs)){
                    ?>
                    <div class="grid__column-5">
                    <div class="home-product-item">
                        <a class="home-product-item__img" href="detail.php?id=<?=$show["MSHH"]?>">
                            <img class="home-product-item__img--with" src="<?=$show["Images"]?>" alt="">
                            <h4 class="home-product__heading"><?=$show["TenHH"]?></h4>
                        </a>
                        <div class="home-product__price">
                            <!-- <div class="home-product__price-old">5.000.000Đ</div> -->
                            <div class="home-product__price-current"><?=number_format($show["Gia"])." VND"?></div>
                        </div>
                        <div class="home-product__rating">
                            <span class="home-product__like">
                                                <!-- <i class="heart-red far fa-heart"></i> -->     
                                                <i class=" fas fa-heart"></i>
                                            </span>
                            <div class="home-product__star">
                                <i class="home-product__star--gold fas fa-star"></i>
                                <i class="home-product__star--gold fas fa-star"></i>
                                <i class="home-product__star--gold fas fa-star"></i>
                                <i class="home-product__star--gold fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="home-product__sell">Đã bán 76</span>
                        </div>
                        <div class="home-product__name">Toàn quốc</div>
                        <div class="home-prodcut__favorite">
                            <i class="home-prodcut__favorite-icon fas fa-check"></i>
                            <span>Yêu thích</span>
                        </div>
                        <div class="home-product__safe-off">
                            <span class="home-product__safe-off-percent"><?=$show['SoLuongHang']?></span>
                            <!-- <span class="home-product__safe-off-label">Giảm</span> -->
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
         <?php } else{ ?>
                
            <?php 
                while($show = mysqli_fetch_array($category)){
            ?>
            <div class="grid__column-5">
            <div class="home-product-item">
                <a class="home-product-item__img" href="detail.php?id=<?=$show["MSHH"]?>">
                    <img class="home-product-item__img--with" src="<?=$show["Images"]?>" alt="">
                    <h4 class="home-product__heading"><?=$show["TenHH"]?></h4>
                </a>
                <div class="home-product__price">
                     <!-- <div class="home-product__price-old">5.000.000Đ</div> -->
                    <div class="home-product__price-current"><?=number_format($show["Gia"])." VND"?></div>
                </div>
                <div class="home-product__rating">
                    <span class="home-product__like">
                                        <!-- <i class="heart-red far fa-heart"></i> -->     
                                        <i class=" fas fa-heart"></i>
                                    </span>
                    <div class="home-product__star">
                        <i class="home-product__star--gold fas fa-star"></i>
                        <i class="home-product__star--gold fas fa-star"></i>
                        <i class="home-product__star--gold fas fa-star"></i>
                        <i class="home-product__star--gold fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="home-product__sell">Đã bán 76</span>
                </div>
                <div class="home-product__name">Toàn quốc</div>
                <div class="home-prodcut__favorite">
                    <i class="home-prodcut__favorite-icon fas fa-check"></i>
                    <span>Yêu thích</span>
                </div>
                <div class="home-product__safe-off">
                    <span class="home-product__safe-off-percent"><?=$show['SoLuongHang']?></span>
                    <!-- <span class="home-product__safe-off-label">Giảm</span> -->
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
          <?php  } ?>

   







    