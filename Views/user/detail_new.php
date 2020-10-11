<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 10/10/2020
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
                    <div class="post-content">
                        <h3><?php echo $post->title?></h3>
                        <?php echo $post->content?>
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
