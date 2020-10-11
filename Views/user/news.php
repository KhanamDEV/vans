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
    <section id="wrap-list-news">
        <div class="banner-news">
            <div class="container">
                <h3>Tin tức vans mới nhất cập nhật mỗi ngày</h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="list-news">
                        <?php foreach ($all as $item){ ?>
                            <div class="item-news">
                                <div class="img">
                                    <a href="<?php echo Helpers::getUrlPage().'news/'.$item->id?>">
                                        <img src="<?php echo Helpers::showImage($item->thumbnail)?>" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4><?php echo $item->title?></h4>
                                    <p><?php echo $item->description?></p>
                                    <a href="<?php echo Helpers::getUrlPage().'news/'.$item->id?>" class="btn">Chi tiết</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <img style="width: 100%;" src="<?php echo Helpers::getPathPublic('user')?>images/50years.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
<?php

include "component/footer-user.php";

?>
