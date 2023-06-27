<?php

namespace Model;

class OrderElementsManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("order_elements");
    }

    public function getByUserId($userId) {
        $req = $this->bdd->prepare("SELECT oe.* FROM " . $this->table . " oe 
                               JOIN orders o ON oe.order_id = o.id
                               WHERE o.user_id = :userId");
        $req->bindParam(":userId", $userId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
    
        $order_elems = [];
        foreach ($req->fetchAll() as $order_elem) {
            $order_elems[$order_elem->order_id] = $order_elem;
            $order_elems[$order_elem->order_id]->product = (new ProductManager())->getById($order_elem->product_id);
        }
        
        return $order_elems;
    }
}