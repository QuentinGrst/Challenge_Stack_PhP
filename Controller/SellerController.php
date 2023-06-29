<?php
namespace Controller;

class SellerController extends BaseController
{

    public function ShowSellerList()
    {
        $sellerList = $this->sellerManager->getAll();
        $this->addParam('sellers', $sellerList);
        // $this->View('sellerList');
    }

    public function ShowSellerByUser($id)
    {
        $seller = $this->sellerManager->getByUserId($id);
        $SellerReviewController = new SellerReviewController((object) ["manager" => ['SellerReview']]);
        $review = null;
        if (!empty($_SESSION['user']->id)) {
            $review = $SellerReviewController->getReviewByUser($id, $_SESSION['user']->id);
        }
        $average = $SellerReviewController->GetAverageReview($id);
        $rating = $SellerReviewController->generateStarRating($average);
        $this->addParam('seller', $seller);
        $this->addParam('review', $review);
        $this->addParam('rating', $rating);
        $this->View('sellerPage');
    }
    
}