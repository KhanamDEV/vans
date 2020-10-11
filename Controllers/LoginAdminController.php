<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 21/08/2020
 * Time: 10:44 AM
 */

require_once("./Models/AdminModel.php");

class LoginAdminController
{
    public $modelAdmin;

    public function __construct()
    {
        $this->modelAdmin = new AdminModel();
    }

    public function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login']) {
                header("Location: index");
            }
        }

        require Helpers::View('admin', 'login');
    }

    public function check()
    {
        $data = [
            "error_email" => '',
            "error_password" => '',
        ];
        $status = true;
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            if (empty($email)) {
                $data['error_email'] = 'Email không được để trống !';
                $status = false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
                $data['error_email'] = 'Vui lòng nhập đúng định dạng email !';
                $status = false;
            }
            if (empty($password)) {
                $data['error_password'] = 'Mật khẩu không được để trống !';
                $status = false;
            }
            if (!empty($password) && strlen($password) < 6) {
                $data['error_password'] = 'Mật khẩu phải dài hơn 6 kí tự !';
                $status = false;
            }
        }
        if ($status) {
            if ($this->modelAdmin->checkLogin($email, md5($password))) {
                $data['url'] = Helpers::getUrlPage() . 'admin';
                if (isset($_POST['remember'])) {
                    if ($_POST['remember'] == "true") {
                        setcookie("email", $_POST["email"], time() + (10 * 365 * 60 * 24 * 60), "/");
                        setcookie("password", md5($_POST["password"]), time() + (10 * 365 * 60 * 24 * 60), "/");
                    }
                    else{
                        setcookie("email", "", time() - (10 * 365 * 60 * 24 * 60), "/");
                        setcookie("password", "", time() - (10 * 365 * 60 * 24 * 60), "/");
                    }
                }
                $_SESSION['login'] = true;
                $_SESSION['type_login'] = 'admin';
            } else {
                $status = false;
                $message = 'Tài khoản hoặc mật khẩu không chính xác !';
            }
        }
        echo Helpers::showResponse($status, $data, $message);
    }

    public function checkRemember()
    {
        if (isset($_COOKIE['email']) && $_COOKIE['password']) {
            return $this->modelAdmin->checkLogin($_COOKIE['email'], $_COOKIE['password']);
        }
        return false;
    }

    public function logout()
    {
        setcookie("email", "", time() - (10 * 365 * 60 * 24 * 60), "/");
        setcookie("password", "", time() - (10 * 365 * 60 * 24 * 60), "/");
        session_destroy();
        header("Location: " . Helpers::getUrlPage() . "admin/loginadmin");
    }
}