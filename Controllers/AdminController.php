<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 2:05 PM
 */

require_once "./Controllers/ProductController.php";
class AdminController
{
    public function __construct()
    {
//        Helpers::checkAuth('admin');
    }

    public function index(){
//        Helpers::checkAuth('admin');
//        $path = Helpers::getPathView('admin').'list_product.php';
//        require "$path";
        $product = new ProductController();
        $product->index();
    }
}