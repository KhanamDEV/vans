<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 2:07 PM
 */
require_once  "./Models/PostModel.php";
require_once "./Models/CategoryModel.php";
require_once  "./Models/FavoritesModel.php";
require_once "./Models/PostModel.php";
class HomeController
{

    private $modelProduct;
    private $modalNews;
    private $modalCategory;
    private $modelFavorites;
    private $modelPost;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
        $this->modalNews = new PostModel();
        $this->modalCategory = new CategoryModel();
        $this->modelFavorites = new FavoritesModel();
        $this->modelPost = new PostModel();
        if(!isset($_COOKIE['session_id'])){
            setcookie("session_id", Helpers::randomString(8), time() + (10 * 365 * 60 * 24 * 60), "/");
        }
    }


    public function index()
    {
        $hotProduct =$this->modelProduct->getProductHot('limit 0, 8');
        $products = $this->modelProduct->getList('limit 0, 8');
        $news = $this->modalNews->getList('limit 0, 8');
        require Helpers::View('user', 'home');
    }


    public function product($param)
    {
        try {
            if (!empty($param) && !in_array($param[0], ['category', 'type'] )){
                $product = $this->modelProduct->getProductById($param[0])->fetchAll()[0];
                $productRelated = $this->modelProduct->getProductRelated($product->category_id);
                if (empty($product)){
                    Helpers::notFound();
                }
                $this->modelProduct->increaseViews($param[0]);
                require Helpers::View('user', 'product_detail');
            }
            else{
                $pages = new Paginator(9, 'p');
                $type = '';
                $category = '';
                $name = 'ALL VANS - TẤT CẢ SẢN PHẨM CỦA VANS';
                if (isset($param[0])){
                    if ($param[0] == 'category'){
                        if (isset($param[1])){
                            $category = $param[1];

                        }
                    }
                    if ($param[0] == 'type'){
                        if (isset($param[1])){
                            $type = $param[1];
                           if ($param[1] == 'mans'){
                                $name = 'VANS MENS - GIÀY VANS DÀNH CHO NAM GIỚI';
                            }
                            if ($param[1] == 'woman'){
                                $name = 'VANS WOMAN - GIÀY VANS DÀNH CHO NỮ GIỚI';
                            }
                            if ($param[1] == 'kids'){
                                $name = 'VANS KID - GIÀY VANS DÀNH CHO TRẺ EM';
                            }
                        }
                    }
                }
                $pages->set_total($this->modelProduct->getList('', $type, $category)->rowCount());
                $products = $this->modelProduct->getList($pages->get_limit(), $type, $category);
                $categories = $this->modalCategory->getAll();
                require Helpers::View('user', 'product');
            }
        } catch (Exception $e){
            Helpers::serverError();
        }

    }


    public function news($param)
    {
        try {
            if (!empty($param)){
                $post = $this->modelPost->getPostById($param[0]);
                require Helpers::View('user', 'detail_new');
            } else{
                $pages = new Paginator(7, 'p');
                $pages->set_total($this->modelPost->getList()->rowCount());
                $all = $this->modelPost->getList($pages->get_limit());
                require Helpers::View('user', 'news');
            }
        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function about(){
        try{
            require Helpers::View('user', 'about_us');
        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function size(){
        try{
            require Helpers::View('user', 'size');
        } catch (Exception $e){
            Helpers::serverError();
        }
    }

    public function favorites(){
        try {
            $pages = new Paginator(9, 'p');
            $pages->set_total($this->modelFavorites->getAll($_COOKIE['session_id'])->rowCount());
            $all = $this->modelFavorites->getAll($_COOKIE['session_id'], $pages->get_limit());
            require Helpers::View('user', 'favorites');
        } catch (Exception $e){
            Helpers::serverError();
        }
    }
}
