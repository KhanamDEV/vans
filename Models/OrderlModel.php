<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 04/10/2020
 * Time: 8:51 AM
 **/


class OrderlModel extends Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "orders";
    }

    public function register($email, $id){
        try {
            $sql = "INSERT INTO $this->table (email, product_id) VALUES(:email, :product_id)";
            $this->connect->beginTransaction();
            if (!self::checkIsset($email, $id)){
                $stmt = $this->connect->prepare($sql);
                $stmt->execute(['email' => $email, 'product_id' => $id]);
            }
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function checkIsset($email, $id){
        try {
            $sql = "SELECT * FROM $this->table WHERE email = :email AND product_id = :product_id";
            $stmt = $this->connect->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute(['email' => $email, 'product_id' => $id]);
            return $stmt->rowCount() > 0 ? true : false;
        } catch (PDOException $e){
            return false;
        }
    }

    public function getAll($limit = '')
    {
        try {
            $sql = "SELECT * FROM $this->table $limit";
            $stmt = $this->connect->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e){
            return [];
        }
    }
}