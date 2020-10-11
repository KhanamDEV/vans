<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 13/09/2020
 * Time: 8:14 PM
 **/

$active = 'booking';
include ('element/meta.php');
include('component/header-main.php');
include('component/nav.php');
?>
<div class="ajax-loading">
    <?php include_once('element/loading.php'); ?>
</div>
<main id="main-admin" >
    <div class="container padding-child bg-white">
        <h3 class="title-page">Danh sách đặt hàng
        </h3>
        <div class="table-data">
            <table class="table">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach ($allBooking as $item){ $product = Helpers::getProduct($item->id)->fetchAll()[0]; ?>
                    <tr>
                        <td><?php echo $item->email ?></td>
                        <td><?php echo $product->name?></td>
                        <td><?php echo number_format($product->price)?>đ</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo isset($pages) ? $pages->page_links() : "";
    ?>
</main>
<?php include 'component/modal.php' ?>
<script> var urlUpdateStatus = "<?php echo Helpers::getUrlPage().'admin/booking/update'?>" </script>
<?php
include('element/script.php');
?>

