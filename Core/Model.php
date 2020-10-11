<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 9:09 AM
 */
require_once ("config.php");

class Model
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    protected $connect;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->dbname = DB_NAME;
        $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}