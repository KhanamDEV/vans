<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 9:07 AM
 */
require_once ('./Helpers/Helpers.php');
require_once ('./Helpers/pagination.php');
require_once ('./lang/vi.php');

class Controller
{
    private $controller = "HomeController";
    private $action = 'index';
    private $param = [];

    public function __construct(){
        Helpers::checkRemember('admin');
//        Helpers::checkRemember('user');
    }

    public function handlingUrl($url){

        if(empty($url)){
            $this->controller = 'HomeController';
            $this->directed($this->controller);
        }
        else{
            if($url[0] == 'admin'){
                $this->controller = "AdminController";
                unset($url[0]);
                if(!empty($url)){

                    if(file_exists("./Controllers/$url[1]Controller.php") && $url[1] != 'home'){
                        $this->controller = ucfirst($url[1]).'Controller';
                    }
                    $this->directed($this->controller);
                    unset($url[1]);
                    if(isset($url[2])){
                        if(method_exists($this->controller, $url[2])){
                            $this->action = $url[2];
                        }
                        unset($url[2]);
                    }
                    $this->param = $url ? array_values($url) : [];
                }
            }
            else{
                $array_single_page = ['product', 'news', 'size', 'about', 'favorites'];
                if(in_array($url[0], $array_single_page)){
                    $this->action = $url[0];
                    unset($url[0]);
                    $this->directed($this->controller);
                }
                else{
                    if(file_exists("./Controllers/$url[0]Controller.php")){
                        $this->controller = ucfirst($url[0]).'Controller';
                    }
                    $this->directed($this->controller);
                    unset($url[0]);
                    if(isset($url[1])){
                        if(method_exists($this->controller, $url[1])){
                            $this->action = $url[1];
                        }
                        unset($url[1]);
                    }
                }
                $this->param = $url? array_values($url) : [];
            }
        }
//        echo $this->controller;
//        echo $this->action;
//        Helpers::debug_param($this->param);
//        call_user_func_array([$this->controller, $this->action], $this->param);
        Helpers::callRouter($this->controller, $this->action, $this->param);
    }

    public function directed($controller)
    {
        try {
            require_once "./Controllers/$controller.php";
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}


