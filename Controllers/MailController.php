<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 04/10/2020
 * Time: 8:19 AM
 **/

require_once "./Helpers/SendMail.php";
require_once "./Models/OrderlModel.php";
class MailController
{
    public function __construct()
    {
    }

    public function buy(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['email']) && isset($_POST['id'])){
                    $mail = new SendMail('Xác nhận mua hàng thành công !', '<h1>Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất</h1>', $_POST['email']);
                    $status = $mail->handle();
                    $message = $status ? 'Gửi thành công !' : 'Gửi không thành công !';
                    if ($status){
                        $insert = new OrderlModel();
                        $insert->register($_POST['email'], $_POST['id']);
                    }
                    echo Helpers::showResponse($status, [], $message);
                }
            }
        } catch (Exception $e){
            echo Helpers::showResponse(false, [], $e->getMessage());
        }
    }
}