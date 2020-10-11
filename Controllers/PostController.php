<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 13/09/2020
 * Time: 10:27 AM
 */
require_once "./Models/PostModel.php";
class PostController
{
    private $postModel;
    public function __construct()
    {
        $this->postModel = new PostModel();

    }

    public function index()
    {
        try {
            $pages = new Paginator(7, 'p');
            $pages->set_total($this->postModel->getList()->rowCount());
            $news = $this->postModel->getList($pages->get_limit());
            require Helpers::View('admin', 'list_post');
        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function create()
    {
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $status = true;
                $dataInsert =[];
                foreach ($_POST as $item){
                    if (Helpers::checkEmpty($item)){
                        $status = false;
                    }
                }
                foreach ($_FILES as $item){
                    if(!Helpers::validateImage($item)){
                        $status = false;
                    }
                }
                if($status){
                    $dataInsert = $_POST;
                    foreach ($_FILES as $index =>$item){
                        $dataInsert[$index] = Helpers::uploadImage($item);
                    }
                }
                $status = $this->postModel->create($dataInsert);
                $location = $status ? 'admin/post' : '';
            }
            $messageModal = (isset($status) && $status) ? MESSAGE_ADD_DONE : MESSAGE_ADD_FAILED;
            require Helpers::View('admin', 'new_post');

        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function update($param)
    {
        try {
            $post = $this->postModel->getPostById($param[0])->fetchAll()[0];
            if (!empty($param) && !empty($post)){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $status = true;
                    $dataInsert =[];
                    foreach ($_POST as $item){
                        if (Helpers::checkEmpty($item)){
                            $status = false;
                        }
                    }
                    if($status){
                        $dataInsert = $_POST;
                        foreach ($_FILES as $index =>$item){
                            if (!$item['error']){
                                $dataInsert[$index] = Helpers::uploadImage($item);
                            }
                        }
                        $dataInsert['id'] = $param[0];
                    }
                    $status = $this->postModel->update($dataInsert);
                    $location = $status ? "admin/post/update/$param[0]" : '';
                }
                $messageModal = (isset($status) && $status) ? UPDATE_DONE : UPDATE_FAILED;
                require Helpers::View('admin', 'update_post');
            } else{
                Helpers::notFound();
            }
        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function delete(){
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['id'])){
                    $status = $this->postModel->delete($_POST['id']);
                    $message = $status ? DELETE_DONE : DELETE_FAILED;
                    echo Helpers::showResponse($status, [], $message);
                }
            }
        } catch (Exception $e){
            echo Helpers::showResponse(false, [], DELETE_FAILED);
        }
    }

}