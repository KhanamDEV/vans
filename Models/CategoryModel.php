<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 10/10/2020
 * Time: 5:58 PM
 **/

require_once "./Core/Model.php";
class CategoryModel extends Model
{
    private $table = 'categorys';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($limit = ''){
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

    public function getCategoryById($id){
        try {
            $sql = "SELECT name FROM $this->table WHERE id = :id";
            $stmt = $this->connect->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute(['id' => $id]);
            return $stmt->fetchAll()[0]->name;
        } catch (PDOException $e){
            return "";
        }
    }

    public function create($name){
        try {
            $sql = "INSERT INTO $this->table (name) VALUES(:name)";
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare($sql);
            $stmt->execute(['name' => $name]);
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            return false;
        }
    }

    public function update($data){
        try {
            $sql = "UPDATE $this->table  SET name = :name WHERE id = :id";
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

    public function delete($id){
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare($sql);
            $stmt->execute(['id' => $id]);
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            return false;
        }
    }
}