<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 01/10/2020
 * Time: 1:30 PM
 **/
include "element/meta-user.php";
include "component/header-user.php";
?>

<main id="main-container">
    <section id="wrap-detail-product" class="padding">
        <div class="container">
            <div class="carousel-detail owl-carousel owl-theme">
                <div class="item">
                    <img src="<?php echo Helpers::showImage($product->image_one)?>" alt="">
                </div>
                <div class="item">
                    <img src="<?php echo Helpers::showImage($product->image_two)?>" alt="">
                </div>
                <div class="item">
                    <img src="<?php echo Helpers::showImage($product->image_three)?>" alt="">
                </div>
                <div class="item">
                    <img src="<?php echo Helpers::showImage($product->image_four)?>" alt="">
                </div>
            </div>
            <div class="description">
                <div class="row">
                    <div class="col-lg-9">
                        <h3 class="name-product"><?php echo $product->name?>
                        </h3>
                        <img src="<?php echo Helpers::getPathPublic('user')?>images/size.png" alt="">
                    </div>
                    <div class="col-lg-3">
                        <button value="<?php echo $product->id?>" id="add-to-favorites" class="btn">Thêm vào giỏ hàng</button>
                        <button value="<?php echo $product->id?>" id="order" data-toggle="modal" data-target="#modal-order" class="btn">Đặt mua</button>
                    </div>
                </div>
            </div>
            <div class="content-product">
                <h3 class="title-detail">
                    Chi tiết sản phẩm
                </h3>
                <p><?php echo $product->content?></p>
                <img src="<?php echo Helpers::showImage($product->image_one)?>" alt="">
                <img src="<?php echo Helpers::showImage($product->image_two)?>" alt="">
                <img src="<?php echo Helpers::showImage($product->image_three)?>" alt="">
                <img src="<?php echo Helpers::showImage($product->image_four)?>" alt="">
            </div>
        </div>
    </section>
    <section id="new-product" class="padding-content">
        <div class="container">
            <div class="title">
                <p>Sản Phẩm Liên Quan

                </p>
                <h2>
                    <span>RELATED PRODUCTS</span>
                    <a href="">Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>                    </a>
                </h2>
            </div>
        </div>
        <div class="bg-product">
            <div class="container">
                <div class="carousel-product owl-carousel owl-theme">
                    <?php foreach ($productRelated as $item){?>
                        <div class="item">
                            <div class="item-product">
                                <div class="img">
                                    <a href="<?php echo Helpers::getUrlPage().'product/'.$item->id?>">
                                        <img src="<?php echo Helpers::showImage($item->image_one)?>" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3><?php echo $item->name?></h3>
                                    <span><?php echo number_format($item->price)?>₫</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    var urlAdd = "<?php echo Helpers::getUrlPage()?>favourite/add";
    var urlMail = "<?php echo Helpers::getUrlPage()?>mail/buy";
</script>
<?php

include "component/footer-user.php";

?>
