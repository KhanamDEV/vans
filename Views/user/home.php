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
    <section id="slide-top">
        <div class="owl-carousel owl-theme carousel-top">
            <div class="item"  ><a href=""><img src="<?php echo Helpers::getPathPublic('user')?>images/slider_1.jpg" alt=""></a></div>
            <div class="item"><a href=""><img src="<?php echo Helpers::getPathPublic('user')?>images/slide_2.jpg" alt=""></a></div>
        </div>
    </section>
    <section id="slide-category">
        <div class="container">
            <div class="owl-carousel owl-theme carousel-category">
                <div class="item"  ><a href="">
                        <div class="item-service">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/service_image_1.png" alt="">
                            <p>OLD SKOOL</p>
                        </div>
                    </a></div>
                <div class="item"  ><a href="">
                        <div class="item-service">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/service_image_2.png" alt="">
                            <p>slip on</p>
                        </div>
                    </a></div>
                <div class="item"  ><a href="">
                        <div class="item-service">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/service_image_3.png" alt="">
                            <p>AUTHENTIC</p>
                        </div>
                    </a></div>
                <div class="item"  ><a href="">
                        <div class="item-service">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/service_image_4.png" alt="">
                            <p>era</p>
                        </div>
                    </a></div>
                <div class="item"  ><a href="">
                        <div class="item-service">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/service_image_5.png" alt="">
                            <p>sk8-hi</p>
                        </div>
                    </a></div>
                <div class="item"  ><a href="">
                        <div class="item-service">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/service_image_6.png" alt="">
                            <p>vans </p>
                        </div>
                    </a></div>
            </div>
        </div>
    </section>
    <section id="category-banner" class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col">
                    <div class="item-banner">
                        <a href="">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/banner_image_1.png" alt="">
                        </a>
                    </div>
                    <div class="item-banner">
                        <a href="">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/banner_image_2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col">
                    <div class="item-banner">
                        <a href="">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/banner_image_3.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col">
                    <div class="item-banner">
                        <a href="">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/banner_image_4.png" alt="">
                        </a>
                    </div>
                    <div class="item-banner">
                        <a href="">
                            <img src="<?php echo Helpers::getPathPublic('user')?>images/banner_image_5.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="best-seller" class="bg-pink padding-content">
        <div class="container">
            <div class="title">
                <p>BEST SELLER</p>
                <h2>
                    <span>Hot Nhất Tại VANS Việt Nam</span>
                    <a href="<?php echo Helpers::getUrlPage()?>product">Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>                    </a>
                </h2>
            </div>
            <div class="carousel-product owl-carousel owl-theme">
                <?php foreach ($products as $item){?>
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
    </section>
    <section id="new-product" class="padding-content">
        <div class="container">
            <div class="title">
                <p>Sản Phẩm Mới Nhất

                </p>
                <h2>
                    <span>NEW ARRIVALS</span>
                    <a href="<?php echo Helpers::getUrlPage()?>product">Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>                    </a>
                </h2>
            </div>
        </div>
        <div class="bg-product">
            <div class="container">
                <div class="carousel-product owl-carousel owl-theme">
                    <?php foreach ($hotProduct as $item){?>
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
    <section id="wrap-news">
        <div class="container">
            <div class="title">
                <p>Tin Tức Cập Nhật Mới Nhất</p>
                <h2>
                    <span>TIN TỨC VỀ VANS</span>
                    <a href="<?php echo Helpers::getUrlPage()?>news">Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i>                    </a>
                </h2>
            </div>
            <div class="carousel-new owl-carousel owl-theme">
                <?php foreach ($news as $item){ ?>
                    <div class="item">
                        <div class="item-news">
                            <div class="time">
                                <p>tháng</p>
                                <p><?php echo date_format(date_create($item->created_at), 'm')?></p>
                                <p><?php echo date_format(date_create($item->created_at), 'Y')?></p>
                            </div>
                            <div class="img">
                                <a href="<?php echo Helpers::getUrlPage().'news/'.$item->id?>">
                                    <img src="<?php echo Helpers::showImage($item->thumbnail)?>" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h3><?php echo $item->title?></h3>
                                <p><?php echo $item->description?></p>
                                <a href="<?php echo Helpers::getUrlPage().'news/'.$item->id?>">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php

include "component/footer-user.php";

?>

