<?php

namespace Model;

class ProductManager extends ModelManager
{
    public function __construct()
    {
        parent::__construct("products");
    }

    public function GetAllProducts($productId)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE product_id = :productId");
        $req->bindParam(":productId", $productId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
}