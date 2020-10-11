<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 21/08/2020
 * Time: 2:32 PM
 */
$active = 'tour';

include ('element/meta.php');
include('component/header-main.php');
include('component/nav.php');
?>
<div class="ajax-loading">
    <?php include_once('element/loading.php'); ?>
</div>
<main id="main-admin" >
    <div class="container padding-child bg-white">
        <h3 class="title-page">Cập nhật sản phẩm</h3>
        <div class="form-tour">
            <form action="<?php echo Helpers::getUrlPage().'admin/product/update/'.$product->id?>" method="post" enctype="multipart/form-data" id="form-update-product">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" value="<?php echo $product->name?>" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Đối tượng</label>
                    <select name="type" id="" class="form-control">
                        <option <?php echo $product->type == 'mans' ? 'selected' : ''?> value="mans">Mans</option>
                        <option <?php echo $product->type == 'woman' ? 'selected' : ''?> value="woman">Woman</option>
                        <option <?php echo $product->type == 'kid' ? 'selected' : ''?> value="kid">Kid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Loại sản phẩm</label>
                    <select name="category_id" id="" class="form-control">
                        <?php
                        if (isset($categories)){
                            foreach ($categories as $item){?>
                                <option <?php echo $product->category_id == $item->id ? 'selected' : ''?> value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" name="price" id="" value="<?php echo $product->price?>" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-xl-3">
                        <label for="form-image-1">Chọn ảnh slide 1</label>
                        <input type="file" name="image_one" class="form-control-file" onchange="readURL(this);"  id="form-image-1">
                        <div class="preview-form-image-1 img" >
                            <img  src="<?php echo  Helpers::showImage($product->image_one) ?>"  alt="">
                        </div>
                    </div>
                    <div class="form-group col-xl-3">
                        <label for="form-image-2">Chọn ảnh slide 2</label>
                        <input type="file" name="image_two" class="form-control-file" onchange="readURL(this);" id="form-image-2">
                        <div class="preview-form-image-2 img">
                            <img src="<?php echo  Helpers::showImage($product->image_two )?>"  alt="">
                        </div>
                    </div>
                    <div class="form-group col-xl-3">
                        <label for="form-image-3">Chọn ảnh slide 3</label>
                        <input type="file" name="image_three" class="form-control-file" onchange="readURL(this);" id="form-image-3">
                        <div class="preview-form-image-3 img">
                            <img src="<?php echo  Helpers::showImage($product->image_three) ?>" alt="">
                        </div>
                    </div>
                    <div class="form-group col-xl-3">
                        <label for="form-image-4">Chọn ảnh slide 4</label>
                        <input type="file" name="image_four" class="form-control-file" onchange="readURL(this);"  id="form-image-4">
                        <div class="preview-form-image-4 img">
                            <img src="<?php echo Helpers::showImage($product->image_four)?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mô tả sản phẩm</label>
                    <textarea name="content" id="" class="form-control" cols="30" rows="5"><?php echo $product->content?></textarea>
                </div>
                <button class="btn bg-orange">Cập nhật</button>
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
    $(document).ready(function () {
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



