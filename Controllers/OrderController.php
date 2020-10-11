<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 11/10/2020
 * Time: 2:40 AM
 **/

require_once "./Models/OrderlModel.php";

class OrderController
{
    private $modelOrder;
    public function __construct()
    {
        $this->modelOrder = new OrderlModel();
    }

    public function index(){
        try {
            $pages = new Paginator(7, 'p');
            $pages->set_total($this->modelOrder->getAll()->rowCount());
            $allBooking = $this->modelOrder->getAll($pages->get_limit());
            require Helpers::View('admin', 'list_book');
        } catch (Exception $e){
            Helpers::serverError();
        }
    }
}