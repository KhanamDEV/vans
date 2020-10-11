<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 05/09/2020
 * Time: 6:17 PM
 */
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
