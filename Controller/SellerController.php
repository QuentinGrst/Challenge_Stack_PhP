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
        $sellerList = $this->sellerManager->getByUserId($id);
    }
}