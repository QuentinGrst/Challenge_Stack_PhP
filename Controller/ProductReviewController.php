<?php
namespace Controller;


class ProductReviewController extends BaseController
{
    public function ShowForm()
    {
        $this->View("ProductReviewForm");
    }
    public function AddReview($productId,$stars)
    {
        if (empty($_SESSION["user"]->id)) {
            echo "no user id";
            return false;
        }
        $userId = $_SESSION["user"]->id;

        $review = $this->productReviewManager->VerifyReview($productId,$userId);
        if($review)
        {
            $test = $this->productReviewManager->update((object) [
                "id"=> intval($review->id),
                "product_id"=>$productId,
                "user_id"=>$userId,
                "stars"=>$stars
            ]);
        }else
        {
            $this->productReviewManager->create((object) [
                "product_id"=>$productId,
                "user_id"=>$userId,
                "stars"=>$stars
            ]);
        }
    }

    public function GetAverageReview($productId)
    {
        $reviews = $this->productReviewManager->GetAllReviews($productId);
        $somme_review = 0;
        $i = 0;
        if($i>0)
        {
            foreach($reviews as $review)
            {
                $i++;
                $somme_review+=$review->stars;
            }
            $moyenne =  $somme_review / $i;
            return $moyenne;
        }
        return;
    }
}