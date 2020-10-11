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
    <section id="wrap-list-product" style="min-height: 600px" class="padding">
        <div class="container">
            <h3 class="mb-4">Giỏ hàng</h3>
            <div class="list-product">
                <div class="row-list row">
                    <?php foreach ($all as $item){ $product = Helpers::getProduct($item->product_id)->fetchAll()[0];  ?>
                        <div class="col-lg-4">
                            <div class="item-product">
                                <div class="img">
                                    <a href="<?php echo Helpers::getUrlPage().'product/'.$product->id?>">
                                        <img src="<?php Helpers::showImage($product->image_one); ?>" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3><?php echo $product->name?></h3>
                                    <span><?php echo number_format($product->price)?>₫</span>
                                    <button class="btn btn-danger delete-favorites" value="<?php echo $product->id?>">Xóa khỏi yêu thích</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
            <?php echo isset($pages) ? $pages->page_links() : "";
            ?>
        </div>
    </section>
</main>
<script>
    var urlRemove = "<?php echo Helpers::getUrlPage()?>favourite/remove"
</script>
<?php

include "component/footer-user.php";

?>
