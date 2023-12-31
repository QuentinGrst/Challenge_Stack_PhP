<?php

namespace Model;

class OrderElementsManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("order_elements");
    }

    public function getByUserId($userId) {
        $req = $this->bdd->prepare("SELECT oe.*, p.name AS product_name, p.price AS product_price
                            FROM " . $this->table . " oe
                            JOIN orders o ON oe.order_id = o.id
                            JOIN products p ON oe.product_id = p.id
                            WHERE o.user_id = :userId");
        $req->bindParam(":userId", $userId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
    
        $order_elems = [];
        foreach ($req->fetchAll() as $order_elem) {
            $order_elems[$order_elem->order_id][$order_elem->id] = $order_elem;
        }
        
        return $order_elems;
    }

    public function getByOrderId($orderId) {
        $req = $this->bdd->prepare("SELECT oe.*, p.name as product_name, p.price as product_price FROM " . $this->table . " oe
                                JOIN products p ON oe.product_id = p.id
                               WHERE oe.order_id = :orderId");
        $req->bindParam(":orderId", $orderId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        
        return $req->fetchAll();
    }

    public function VerifyIfExist($productId,$orderId)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE product_id = :productId AND order_id = :orderId ");
        $req->bindParam(":productId", $productId);
        $req->bindParam(":orderId", $orderId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

    public function GetElementToOrder($id)
    {
        $req = $this->bdd->prepare("SELECT oe.*, o.user_id FROM ". $this->table . " oe
                                        JOIN orders o ON oe.order_id = o.id
                                        WHERE oe.id = :id");
        $req->bindParam(":id",$id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
}