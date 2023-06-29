<?php

namespace Model;

class OrderManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("orders");
    }

    public function getByUserId($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE user_id = :id ORDER BY datetime DESC");
        $req->bindParam(":id", $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function GetOrderByStatus($userId, $status)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE status = :status AND user_id = :userId ORDER BY datetime DESC");
        $req->bindParam(":userId", $userId);
        $req->bindParam(":status", $status);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }
}