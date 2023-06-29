<?php
namespace Controller;


class SellerReviewController extends BaseController
{
    public function ShowForm()
    {
        $this->View("ProductReviewForm");
    }
    public function AddReview($sellerId,$stars)
    {
        if (empty($_SESSION["user"]->id)) {
            echo "no user id";
            return false;
        }
        $userId = $_SESSION["user"]->id;

        $review = $this->sellerReviewManager->VerifyReview($sellerId,$userId);
        if($review)
        {
            $test = $this->sellerReviewManager->update((object) [
                "id"=> intval($review->id),
                "product_id"=>$sellerId,
                "user_id"=>$userId,
                "stars"=>$stars
            ]);
        }else
        {
            $this->sellerReviewManager->create((object) [
                "product_id"=>$sellerId,
                "user_id"=>$userId,
                "stars"=>$stars
            ]);
        }
    }

    public function GetAverageReview($sellerId)
    {
        $reviews = $this->sellerReviewManager->GetAllReviews($sellerId);
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

    public function getReviewByUser($sellerId, $userId)
    {
        $review = $this->sellerReviewManager->VerifyReview($sellerId, $userId);
        return $review;
    }

    // Fonction pour générer le code HTML des étoiles
    function generateStarRating($rating) {
        $rating = intval($rating);
        $rating = max(0, min(5, $rating));
        $output = '';
        for ($i = 1; $i <= 5; $i++) {
        if ($rating >= $i) {
            // Étoile pleine si la note est supérieure ou égale à $i
            $output .= '&#9733;';
        } else {
            // Étoile vide si la note est inférieure à $i
            $output .= '&#9734;';
        }
        }
        return $output;
    }
}