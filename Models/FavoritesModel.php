<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 11/10/2020
 * Time: 9:12 AM
 **/

require_once "./Core/Model.php";
class FavoritesModel extends Model
{
    private $table = 'favorites';

    public function __construct()
    {
        parent::__construct();
    }

    public function addToFavorites($data){
        try {
            $sql = "INSERT INTO $this->table (product_id, session_id) VALUES (:product_id, :session_id)";
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare($sql);
            $stmt->execute($data);
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            return false;
        }
    }

    public function remove($data){
        try {
            $sql = "DELETE FROM $this->table WHERE product_id = :product_id AND session_id = :session_id";
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare($sql);
            $stmt->execute($data);
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            return false;
        }
    }

    public function getAll($id, $limit = ''){
        try {
            $sql = "SELECT * FROM $this->table WHERE session_id = :session_id $limit";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute(['session_id' => $id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt;
        } catch (PDOException $e){
            return [];
        }
    }

    public function checkIsset($data)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE product_id = :product_id AND session_id = :session_id";
            $stmt = $this->connect->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute($data);
            return count($stmt->fetchAll()) > 0 ? true : false;
        } catch (PDOException $e){
            return false;
        }
    }
}