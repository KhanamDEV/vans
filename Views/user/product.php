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
    <section id="wrap-list-product" class="padding">
        <div class="container">
            <div class="row">
                <div class="main-left col-lg-9">
                    <h3 class="title-list-product">
                        <?php echo $name?>
                    </h3>
                    <div class="row-list row">
                        <?php foreach ($products as $item) { ?>
                            <div class="col-lg-4">

                                <div class="item">
                                    <div class="item-product">
                                        <div class="img">
                                            <a href="<?php echo Helpers::getUrlPage() . 'product/' . $item->id ?>">
                                                <img src="<?php echo Helpers::showImage($item->image_one) ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3><?php echo $item->name ?></h3>
                                            <span><?php echo number_format($item->price) ?>₫</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php echo isset($pages) ? $pages->page_links() : "";
                    ?>
                </div>
                <div class="main-right col-lg-3">
                    <h3 class="title-main-right ">
                        vans viet nam
                    </h3>
                    <ul class="road-map-page">
                        <li><a href="">all vans</a></li>
                        <li class="include-submenu">
                            <a href="">style</a>
                            <i class="fa fa-chevron-down" id="show-submenu" aria-hidden="true"></i>
                            <div class="sub-menu">
                                <ul>
                                    <?php foreach ($categories as $item){ ?>
                                        <li><a href="<?php echo Helpers::getUrlPage().'product/category/'.$item->id?>"><?php echo $item->name?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo Helpers::getUrlPage() ?>product/type/mans">mens</a>
                        </li>
                        <li>
                            <a href="<?php echo Helpers::getUrlPage() ?>product/type/woman">womens</a>
                        </li>
                        <li>
                            <a href="<?php echo Helpers::getUrlPage() ?>product/type/kids">kids</a>
                        </li>
                        <li>
                            <a href="<?php echo Helpers::getUrlPage() ?>news">latest vans news</a>
                        </li>
                        <li>
                            <a href="<?php echo Helpers::getUrlPage() ?>about">about us</a>
                        </li>
                        <li>
                            <a href="<?php echo Helpers::getUrlPage() ?>size">size chart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
<?php

include "component/footer-user.php";

?>
