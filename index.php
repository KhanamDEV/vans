<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 9:16 AM
 */
if(session_id() == ''){
    session_start();
}

error_reporting(E_ALL);
ini_set("display_errors","On");
require_once('./Core/Controller.php');
require_once ('./Helpers/Helpers.php');
class Index
{
    private $url;

    public function __construct()
    {
        if (isset($_GET['url'])) {
            $this->url = explode("/", $_GET['url']);
        }
    }

    public function callController()
    {
        $controller = new Controller();
        $controller->handlingUrl($this->url);
    }
}

$index = new Index();
$index->callController();