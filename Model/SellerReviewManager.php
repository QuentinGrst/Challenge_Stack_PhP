<?php

namespace Model;

class SellerReviewManager extends ModelManager{
    public function __construct()
    {
        parent::__construct("seller_reviews");
    }

    public function VerifyReview($sellerId, $userId)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE seller_id = :sellerId AND user_id = :userId");
        $req->bindParam(":sellerId", $sellerId);
        $req->bindParam(":userId", $userId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

    public function GetAllReviews($sellerId)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE seller_id = :sellerId");
        $req->bindParam(":sellerId", $sellerId);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
    
}