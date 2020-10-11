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
        <h3 class="title-page">Danh sách loại giày
            <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAdd" class="btn bg-orange new-button">Thêm mới</a>
        </h3>
        <div class="table-data">
            <table class="table">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    <?php if (isset($categories)){
                        foreach ($categories as $item){ ?>
                    <tr>
                            <td>
                                <input type="text" value="<?php echo $item->name?>" class="form-control">
                                <span style="font-size: 80%" class="text-danger"></span>
                            </td>
                            <td>
                                <div class="group-button">
                                    <button class="btn bg-orange update-category"  value="<?php echo $item->id?>">Cập nhật</button>
                                    <button value="<?php echo $item->id?>" class="btn btn-danger delete-category">Xóa</button>
                                </div>
                            </td>
                    </tr>

                        <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo isset($pages) ? $pages->page_links() : "";
    ?>
</main>
<div class="modal fade" id="modalAdd" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginTitle">Thêm mới danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-category" action="">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="name" id="inputName" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="add-category" class="button-submit-modal btn bg-orange">
                    Thêm mới danh mục</button>
            </div>
        </div>
    </div>
</div>

<?php include 'component/modal.php' ?>
<script>
    var urlDelete = "<?php echo Helpers::getUrlPage().'admin/category/delete' ?>";
    var urlCreate = "<?php echo Helpers::getUrlPage().'admin/category/create' ?>";
    var urlUpdate = "<?php echo Helpers::getUrlPage().'admin/category/update' ?>"
</script>
<?php
include('element/script.php');
?>

