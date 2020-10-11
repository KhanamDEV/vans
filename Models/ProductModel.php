<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 03/10/2020
 * Time: 7:18 PM
 **/

require_once "./Core/Model.php";

class ProductModel extends Model
{
    private $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    public function create($data){
        try {
            $sql = "INSERT INTO $this->table (name, type,category_id ,price, image_one,image_two,image_three, image_four,content) VALUES (:name, :type, :category_id, :price, :image_one, :image_two, :image_three, :image_four, :content)";
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
            $image = isset($data['image_one']) ? " , image_one = :image_one" : '';
            $image .= isset($data['image_two']) ? ", image_two = :image_two" : '';
            $image .= isset($data['image_three']) ? ", image_three = :image_three" : '';
            $image .= isset($data['image_four']) ? ", image_four = :image_four" : '';
            $sql = "UPDATE $this->table SET name = :name, type = :type, category_id = :category_id, price = :price, content = :content $image WHERE id = :id";
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

    public function getList($limit = '', $type = '', $category = ''){
        try {
            $cond = '';
            $data = [];
            if (!Helpers::checkEmpty($type) && Helpers::checkEmpty($category) ){
                $cond = "WHERE type = :type";
                $data['type'] = $type;
            }
            else if (Helpers::checkEmpty($type) && !Helpers::checkEmpty($category)){
                $cond = "WHERE category_id = :category";
                $data['category'] = $category;
            }
            else if(!Helpers::checkEmpty($type) && !Helpers::checkEmpty($category)){
                $cond = "WHERE type = :type AND category_id = :category";
                $data['type'] = $type;
                $data['category'] = $category;
            }
            $sql = "SELECT * FROM $this->table $cond $limit";
            $stmt = $this->connect->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute($data);
            return $stmt;
        } catch (PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }

    public function getProductById($id){
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute(['id' => $id]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt;
        } catch (PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }

    public function getProductHot($limit = ''){
        try {
            $sql = "SELECT * FROM $this->table ORDER BY view DESC $limit";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt;
        } catch (PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }

    public function getProductRelated($category){
        try {
            $sql = "SELECT * FROM $this->table WHERE category_id = :category_id";
            $stmt = $this->connect->prepare($sql);
            $stmt->execute(['category_id' => $category]);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt;
        } catch (PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }

    public function increaseViews($id){
        try {
            //get old value view
            $stmtOldView = $this->connect->prepare("SELECT view FROM ".$this->table." WHERE id = :id");
            $stmtOldView->setFetchMode(PDO::FETCH_OBJ);
            $stmtOldView->execute(['id' => $id]);
            $newView = (int)$stmtOldView->fetch()->view + 1;

            //update new value view
            $this->connect->beginTransaction();
            $stmt = $this->connect->prepare("UPDATE ".$this->table." SET view = :count_view WHERE id = :id");
            $stmt->execute(['count_view' => $newView, 'id' => $id]);
            $this->connect->commit();
        } catch (PDOException $e){
            echo $e->getMessage();
            $this->connect->rollBack();
            return false;
        }
    }
}