<?php

namespace Model;

class ProductReviewManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("product_reviews");
    }

    public function VerifyReview($productId, $userId)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE product_id = :productId AND user_id = :userId");
        $req->bindParam(":productId", $productId);
        $req->bindParam(":userId", $userId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

    public function GetAllReviews($productId)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE product_id = :productId");
        $req->bindParam(":productId", $productId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
    
}