<?php
namespace Controller;

use DateTime;

class OrderController extends BaseController{

public function ShowOrderList()
{
    $orderList = $this->orderManager->getAll();
    var_dump($orderList);
    // $this->addParam('orders', $orderList);
    //$this->View('orderList');
}

public function ShowOrderByUser($id)
{
    $orderList = $this->orderManager->getByUserId($id);
}

public function VerifyStatus($userId)
{
    $order = $this->orderManager->GetOrderByStatus($userId, 0);
    if(!$order)
    {
        $this->orderManager->create((object) [
            "status"=>0,
            "user_id"=>$userId,
            "datetime"=>(new DateTime())->format('c')
        ]);
    }
}

/*public function OrderForm()
{
    $this->View("orderForm");
}*/
}