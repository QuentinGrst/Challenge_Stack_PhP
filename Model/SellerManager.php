<?php

namespace Model;

class SellerManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("users");
    }

    public function getByUserId($id)
    {
        $req = $this->bdd->prepare("SELECT pseudo, is_seller, description FROM " . $this->table . " WHERE id = :id");
        $req->bindParam(":id", $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $user = $req->fetch();
        if (!$user || empty($user->is_seller) || !$user->is_seller)
        {
            return false;
        }
        return $user;
    }
    
}