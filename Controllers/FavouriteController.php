<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 11/10/2020
 * Time: 9:34 AM
 **/

require_once "./Models/FavoritesModel.php";
class FavouriteController
{

    private $modelFavorites;

    public function __construct()
    {
        $this->modelFavorites = new FavoritesModel();
    }

    public function add(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = ['product_id' => $_POST['product_id'], 'session_id' => $_COOKIE['session_id']];
                if (isset($_POST['product_id'])){
                    if ($this->modelFavorites->checkIsset($data)){
                        echo Helpers::showResponse(false, [], 'Sản phẩm đã có trong giỏ hàng !');
                    } else{
                        $status = $this->modelFavorites->addToFavorites($data);
                        $message = $status ? MESSAGE_ADD_DONE : MESSAGE_ADD_FAILED;
                        echo Helpers::showResponse($status, [], $message);
                    }
                }
            }
            else{
                Helpers::notFound();
            }
        } catch (Exception $e){
            echo Helpers::showResponse(false, [], MESSAGE_ADD_FAILED);
        }
    }

    public function remove(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['product_id'])){
                    $status = $this->modelFavorites->remove(['product_id' => $_POST['product_id'], 'session_id' => $_COOKIE['session_id']]);
                    $message = $status ? DELETE_DONE : DELETE_FAILED;
                    echo Helpers::showResponse($status, [], $message);
                }
            }
            else{
                Helpers::notFound();
            }
        } catch (Exception $e){
            echo Helpers::showResponse(false, [], DELETE_FAILED);
        }
    }


}