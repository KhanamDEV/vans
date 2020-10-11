<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 14/09/2020
 * Time: 4:13 PM
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
        <h3 class="title-page">Thêm mới bài viết</h3>
        <div class="form-tour">
            <form action="<?php echo Helpers::getUrlPage()?>admin/post/create" method="post" enctype="multipart/form-data" id="form-new-post">
                <div class="form-group">
                    <label for="inputTitle">Nhập tiêu đề bài viết</label>
                    <input type="text" name="title" class="form-control" id="inputTitle">
                </div>
                <div class="form-row">
                    <div class="form-group col-xl-4">
                        <label for="form-image-2">Chọn ảnh đại diện</label>
                        <input type="file" name="thumbnail" class="form-control-file" onchange="readURL(this);" id="form-image-2">
                        <div class="preview-form-image-2 img">
                            <img style="max-height: 250px; width: auto" src="<?php echo Helpers::getPathPublic('admin')?>images/no_image.webp"  alt="">
                        </div>
                    </div>
                    <div class="form-group col-xl-8">
                        <label for="inputDescription">Mô tả ngắn</label>
                        <textarea class="form-control" cols="" rows="12" name="description" id="inputDescription"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor1">Nội dung</label>
                    <textarea name="content"  id="editor1" cols="310"  rows="2"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
                </div>
                <button class="btn bg-orange">Thêm bài viết</button>
            </form>
        </div>
    </div>
</main>
<?php include 'component/modal.php' ?>
<?php
include('element/script.php');
if (isset($status)){
    echo "<script> let status = true </script>";
}
?>
<script>
    $(document).ready(function (){
        CKEDITOR.replace( 'editor1',{
            filebrowserUploadUrl: '../../plugins/ckeditor/ck_upload.php',
            filebrowserUploadMethod: 'form'
        } );
        if (status){
            $("#modalMessage").modal("show");
        }
    })
    function readURL(input) {
        if (input.files && input.files[0]) {
            loading(1);
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.preview-' + $(input).attr('id') + ' img')
                    .attr('src', e.target.result);
                loading();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

