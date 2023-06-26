<?php

namespace Model;

class OrderManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("order");
    }

    public function getByUserId($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE user_id = :id");
        $req->bindParam(":id", $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
    
}