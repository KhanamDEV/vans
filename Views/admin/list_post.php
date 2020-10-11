<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 13/09/2020
 * Time: 8:14 PM
 **/

$active = 'post';
include ('element/meta.php');
include('component/header-main.php');
include('component/nav.php');
?>
<div class="ajax-loading">
    <?php include_once('element/loading.php'); ?>
</div>
<main id="main-admin" >
    <div class="container padding-child bg-white">
        <h3 class="title-page">Danh sách bài viết
            <a href="<?php echo Helpers::getUrlPage()?>admin/post/create" class="btn bg-orange new-button">Thêm mới</a>
        </h3>
        <div class="table-data">
            <table class="table">
                <thead>
                <tr>
                    <th>Tên bài viết</th>
                    <th>Ngày đăng</th>
                    <th>Ảnh mô tả</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($news as $item) { ?>
                    <tr>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo date_format(date_create($item->created_at), 'Y-m-d'); ?></td>
                        <td><img style="max-width: 50px" src="<?php echo Helpers::showImage($item->thumbnail)?>" alt=""></td>
                        <td>
                            <div class="group-button">
                                <a href="<?php echo Helpers::getUrlPage().'admin/post/update/'.$item->id?>" class="btn bg-orange">Chỉnh sửa</a>
                                <button value="<?php echo $item->id?>" class="btn btn-danger delete-post">Xóa</button>
                            </div>
                        </td>
                    </tr>
                <?php }?>

                </tbody>
            </table>
        </div>
    </div>
    <?php echo isset($pages) ? $pages->page_links() : "";
    ?>
</main>
<?php include 'component/modal.php' ?>
<script> var urlDelete = "<?php echo Helpers::getUrlPage().'admin/post/delete'?>" </script>
<?php
include('element/script.php');
?>

