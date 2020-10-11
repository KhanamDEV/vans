<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 16/09/2020
 * Time: 4:57 PM
 **/
?>
<div class="modal fade" id="modalAdd" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginTitle">Thêm
                    mới <?php echo isset($active) && $active == 'location' ? 'địa điểm' : 'dịch vụ vận tải' ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add" action="">
                    <div class="form-group">
                        <label for="input<?php echo isset($active) ? $active : '' ?>">Nhập
                            tên <?php echo isset($active) && $active == 'location' ? 'địa điểm' : 'dịch vụ vận tải' ?></label>
                        <input type="text" name="<?php echo $active; ?>"
                               id="input<?php echo isset($active) ? $active : '' ?>" class="form-control">
                    </div>
                    <?php if ($active == 'location') {
                        echo '<div class="form-group">
                        <label for="selectTypeLocation">Chọn loại địa điểm</label>
                        <select name="type_location"  class="form-control" id="selectTypeLocation">
                            <option value="domestic">Địa điểm trong nước</option>
                            <option value="foreign">Địa điểm ngoài nước</option>
                        </select>
                    </div>';
                    } ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="button-submit-modal btn bg-orange">
                    Thêm <?php echo isset($active) && $active == 'location' ? 'địa điểm' : 'dịch vụ vận tải' ?></button>
            </div>
        </div>
    </div>
</div>
