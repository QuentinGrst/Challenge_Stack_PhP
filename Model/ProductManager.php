<?php

namespace Model;

class ProductManager extends ModelManager
{
    public function __construct()
    {
        parent::__construct("products");
    }

    public function GetAllProductsInventory()
    {
        $userId = $_SESSION['user']->id;
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE p.state = 1 AND p.seller_id = :userId");
        $req->bindParam(":userId", $userId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function GetAllProducts()
    {
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE p.state = 1 ");
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function GetAllArchivedInventory()
    {
        $userId = $_SESSION['user']->id;
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE p.state = 0 AND p.seller_id = :userId");
        $req->bindParam(":userId", $userId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function GetAllArchived()
    {
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE p.state = 0");
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function SearchProductsWithInput($search)
    {
        $req = $this->bdd->prepare("SELECT p.*, u.pseudo as seller_name, u.id as seller_id FROM " . $this->table . " p JOIN users u ON u.id = p.seller_id WHERE (p.name LIKE :search OR p.description LIKE :search) AND state = 1");
        $searchTerm = "%" . $search . "%";
        $req->bindParam(":search", $searchTerm);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function archiveProduct($id)
    {
        $req = $this->bdd->prepare("UPDATE " . $this->table . " SET `state`=0 WHERE id = :id");
        $req->bindParam(":id", $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

    public function unArchiveProduct($id)
    {
        $req = $this->bdd->prepare("UPDATE " . $this->table . " SET `state`=1 WHERE id = :id");
        $req->bindParam(":id", $id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
}