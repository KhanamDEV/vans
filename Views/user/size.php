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
    <section id="wrap-list-news" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 size">
                    <h3 class="title">Size Giày VANS -Cách Đo Size Giày VANS Chi Tiết</h3>
                    <p>Cách kiểm tra size giày VANS:
                    </p>
                    <p><span>Bước 1: </span>Chuẩn bị một tờ giấy và đặt chân lên tờ giấy đó.</p>
                    <p><span>Bước 2: </span>Vẽ gót chân và mũi chân lên tờ giấy.</p>
                    <p><span>Bước 3: </span>Kẻ 1 đường từ đầu gót chân đến đầu ngón dài nhất như hình (lưu ý: sử dụng
                        ngón chân dài nhất vì một số người dài ngón cái, một số người dài ngón giữa v.v...)</p>
                    <img src="<?php echo Helpers::getPathPublic('user') ?>images/cach-do-size-vans.png" alt="">
                    <p><span>Bước 4: </span>Đo chiều dài đường thẳng vừa kẻ và so sánh với mục Cm của bảng dưới.</p>
                    <img src="<?php echo Helpers::getPathPublic('user') ?>images/size.png" alt="">
                    <p><span>Lưu ý: </span></p>
                    <p>1/ Mỗi hãng thể thao có mỗi bảng size khác nhau, không áp dụng size của hãng khác vào hãng
                        VANS.</p>
                    <p>2/ Với phiên bản VANS Slip-on (giày lười của VANS) bạn nên mang rộng thêm 1 size.</p>
                    <p>Sản phẩm của cửa hàng VANS chính thức tại Việt Nam sẽ có phiếu bảo hành, có tag trên sản phẩm và
                        có một barcore riêng trên hộp giày, nếu sản phẩm không có những đặc điểm trên thì sản phẩm đó
                        không phải của công ty và chúng tôi không chịu trách nhiệm về những sản phẩm đó.</p>
                    <img src="<?php echo Helpers::getPathPublic('user') ?>images/fake.jpg" alt="">
                </div>
                <div class="col-lg-3">
                    <img style="width: 100%;" src="<?php echo Helpers::getPathPublic('user') ?>images/50years.jpg"
                         alt="">
                </div>
            </div>
        </div>
    </section>
</main>
<?php

include "component/footer-user.php";

?>
