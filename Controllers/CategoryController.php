<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 10/10/2020
 * Time: 5:57 PM
 **/

require_once  "./Models/CategoryModel.php";
class CategoryController
{
    private $modalCategory;

    public function __construct()
    {
        $this->modalCategory = new CategoryModel();
    }

    public function index()
    {
        try {
            $pages = new Paginator('7', 'p');
            $pages->set_total($this->modalCategory->getAll()->rowCount());
            $categories = $this->modalCategory->getAll($pages->get_limit());
            require Helpers::View('admin', 'category');
        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function create(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['name']) && !Helpers::checkEmpty($_POST['name'])){
                    $status = $this->modalCategory->create($_POST['name']);
                    $message = $status ? MESSAGE_ADD_DONE : MESSAGE_ADD_FAILED;
                    echo Helpers::showResponse($status, [], $message);
                }
            }
            else{
                Helpers::notFound();
            }
        } catch (Exception $e){
            echo Helpers::showResponse(false, [], MESSAGE_ADD_FAILED);
        }
    }

    public function update(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['name']) && !Helpers::checkEmpty($_POST['name'])){
                    $status = $this->modalCategory->update($_POST);
                    $message = $status ? UPDATE_DONE : UPDATE_FAILED;
                    echo Helpers::showResponse($status, [], $message);
                }
            }
            else{
                Helpers::notFound();
            }
        } catch (Exception $e){
            echo Helpers::showResponse(false, [], UPDATE_FAILED);
        }
    }

    public function delete(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['id']) && !Helpers::checkEmpty($_POST['id'])){
                    $status = $this->modalCategory->delete($_POST['id']);
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