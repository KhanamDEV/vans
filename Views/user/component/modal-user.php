<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 10/10/2020
 * Time: 10:11 AM
 **/
?>
<div class="modal fade" id="modalMessage" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4><?php echo isset($messageModal) ? $messageModal : ''?></h4>
            </div>
            <div class="modal-footer">
                <a <?php echo isset($location) &&  $location == '' ? 'data-dismiss="modal"' : '' ?> class="btn bg-orange " href="<?php
                if (isset($location)){
                    echo $location == '' ? 'javascript:void(0)' : Helpers::getUrlPage().$location;
                }
                ?>">OK</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-order" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="margin: 0 auto" class="text-center">Vui lòng điền thông tin</h4>
            </div>
            <div class="modal-body">
                <form action="" id="form-order">
                    <div class="form-group">
                        <label for="">Email </label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <button class="btn btn-success" id="confirm-order" type="button">Nhận email</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
