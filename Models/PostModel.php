<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 11/10/2020
 * Time: 12:30 AM
 **/

require_once "./Core/Model.php";
class PostModel extends Model
{
    private $table = 'news';
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data){
        try {
            $sql = "INSERT INTO $this->table (title, thumbnail, content, description) VALUES (:title, :thumbnail, :content, :description)";
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare($sql);
            $stmt->execute($data);
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function update($data){
        try {
            $image = isset($data['thumbnail']) ? " , thumbnail = :thumbnail" : '';
            $sql = "UPDATE $this->table SET title = :title, content = :content, description = :description $image WHERE id = :id";
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare($sql);
            $stmt->execute($data);
            $this->connect->commit();
            return true;
        } catch (PDOException $e){
            $this->connect->rollBack();
            echo $e->getMessage();
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

    public function getList($limit = ''){
        try {
            $sql = "SELECT * FROM $this->table $limit";
            $stmt = $this->connect->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }

    public function getPostById($id){
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute(['id' => $id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll()[0];
        } catch (PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }

}