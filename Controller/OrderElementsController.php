<?php
namespace Controller;

class OrderElementsController extends BaseController{

    public function GetOrderElementsByUser($id)
    {
        return $this->orderElementsManager->getByUserId($id);
    }
}