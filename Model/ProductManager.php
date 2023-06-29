<?php

namespace Model;

class ProductManager extends ModelManager
{
    public function __construct()
    {
        parent::__construct("products");
    }

    public function GetAllProducts()
    {
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE p.state = 1 ");
        
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function SearchProductsWithInput($search)
    {
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE (name LIKE :search OR description LIKE :search) AND state = 1");
        $searchTerm = "%" . $search . "%";
        $req->bindParam(":search", $searchTerm);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }


}