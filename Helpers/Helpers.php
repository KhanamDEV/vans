<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 9:57 AM
 */
require_once ('./Middleware/AdminAuthenticate.php');
//require_once ('./Middleware/UserAuthenticate.php');
require_once ('./Models/AdminModel.php');
//require_once ('./Models/UserModel.php');
//require_once ('./Models/LocationModel.php');
//require_once ('./Models/TransportModel.php');
require_once ('NotFoundException.php');
class Helpers
{
    public static function debug_param($param){
        echo '<pre>';
        print_r($param);
        echo '</pre>';
    }

    public static function getPathPublic($type){
        return self::getUrlPage().'public/'.$type.'/';
    }

    public static function getPathView($type){
        return './Views/'.$type.'/';
    }

    public static function getUrlPage(){
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST']. '/' ;
    }

    public static function checkAuth($guard){
        if($guard == 'admin'){
            $adminAuthenticate = new AdminAuthenticate();
            if(!$adminAuthenticate->handle()){
                header('Location:'.Helpers::getUrlPage().'admin/loginadmin');
            }
        }
        return false;
    }

    public static function showResponse($status = false,$data = [], $message = null){
        $response = [
            "status" => $status,
            "response" => !(empty($data)) ? $data : [],
            "message" => !(empty($message)) ? $message : ''
        ];
        return json_encode($response);
    }

    public static function callRouter($controller, $action, $param){
        require_once "./Controllers/AdminController.php";
        $controller_use = new $controller();
        $controller_use->$action($param);
    }

    public static function checkRemember($type){
        $modelAdmin = new AdminModel();
        if($type == 'admin'){
            if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
                if($modelAdmin->checkLogin($_COOKIE['email'], $_COOKIE['password'])){
                    $_SESSION['login'] = true;
                    $_SESSION['type_login'] = 'admin';
                }
            }
        }
    }

    public static function validateImage($image){
        $pattern = '/^(image\/jpeg)|(image\/png)|(image\/jpg)$/';
        if(preg_match($pattern, $image['type']) && getimagesize($image['tmp_name'])){
            return true;
        }
        return false;
    }


    public static function uploadImage($image){
        try {
            $rand = rand(1, 1000);
            $target_save =  "./public/upload/".$rand.Helpers::slug($image['name']);
            move_uploaded_file($image['tmp_name'], $target_save);
            chmod($target_save, 0777);
            return trim($target_save, "./");
        } catch (Exception $e){
            return Helpers::getPathPublic('admin')."images/no_image.webp";
        }
    }

    public static function checkEmpty($str){
        $str = str_replace(" ", "", $str);
        return empty($str) ? true : false;
    }

   public static function filterData($array){
        unset($array['url']);
        $array = array_filter($array);
        $finalData = [];
        foreach ($array as $key=>$value){
            $finalData = array_merge($finalData, [$key => $value]);
        }
        return $finalData;
   }

   public static function serverError(){
        require "./Views/500.php";
   }

   public static  function notFound(){
        require "./Views/404.php";
   }
    public static function checkIssetView($path)
    {
        if (!file_exists($path)){
            throw new NotFoundException('page_not_found');
        }
    }

    public static function View($type,$path){
        $path  = Helpers::getPathView($type).$path.'.php';
        if (!file_exists($path)){
            throw new NotFoundException('page_not_found');
        }
        return "$path";
    }

    public static function randomString($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function showImage($image){
        echo Helpers::getUrlPage().$image;
    }

    public static function slug($string){
        $string = preg_replace("/(á|à|ạ|ã|ả|ă|ắ|ẳ|ằ|ặ|ẵ|â|ấ|ầ|ậ|ẫ|ẩ)/","a",$string);
        $string = preg_replace("/(Á|À|Ạ|Ã|Ả|Ă|Ẳ|Ằ|Ắ|Ặ|Ẵ|Â|Ầ|Ấ|Ậ|Ẫ|Ẩ)/","a",$string);
        $string = preg_replace("/(đ|Đ)/","d",$string);
        $string = preg_replace("/(è|é|ẹ|ẽ|ẻ|ê|ế|ề|ệ|ể|ễ)/","e",$string);
        $string = preg_replace("/(È|É|Ẹ|Ẽ|Ẻ|Ê|Ế|Ề|Ệ|Ể|Ễ)/","e",$string);
        $string = preg_replace("/(ì|í|ị|ĩ|ỉ)/","i",$string);
        $string = preg_replace("/(Ì|Í|ị|ĩ|Ỉ)/","i",$string);
        $string = preg_replace("/(ò|ó|ọ|õ|ỏ|ô|ồ|ố|ộ|ỗ|ổ|ơ|ờ|ớ|ợ|ỡ|ở)/","o",$string);
        $string = preg_replace("/(Ò|Ó|Ọ|Õ|Ỏ|Ô|Ồ|Ố|Ộ|Ỗ|Ổ|Ơ|Ờ|Ớ|Ợ|Ỡ|Ở)/","o",$string);
        $string = preg_replace("/(ù|ú|ụ|ũ|ủ|ư|ừ|ứ|ự|ữ|ử)/","u",$string);
        $string = preg_replace("/(Ù|Ú|Ụ|Ũ|Ủ|Ư|Ừ|Ứ|Ự|Ữ|Ử)/","u",$string);
        $string = preg_replace("/(ỳ|ý|ỷ|ỵ|ỷ)/","y",$string);
        $string = preg_replace("/(Ỳ|Ý|Ỷ|Ỵ|Ỷ)/","y",$string);
        $string = str_replace(" ","-",$string);
        $string = strtolower($string);
        return $string;
    }

    public static function categoryRender($id){
        require_once "./Models/CategoryModel.php";
        $model = new CategoryModel();
        return $model->getCategoryById($id);
    }

    public static function getProduct($id){
        require_once "./Models/ProductModel.php";
        $model = new ProductModel();
        return $model->getProductById($id);
    }
}