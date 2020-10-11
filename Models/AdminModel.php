<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 25/08/2020
 * Time: 9:37 AM
 */

require_once ('./Core/Model.php');
class AdminModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin($email, $password){
        $stmt = $this->connect->prepare("SELECT * FROM admins WHERE email = :email AND password = :password");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(['email' => $email, 'password' => $password]);
        return $stmt->rowCount() > 0 ? true : false;
    }

}

