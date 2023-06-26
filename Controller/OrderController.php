<?php
namespace Controller;

class OrderController extends BaseController{

public function ShowOrderList()
{
    $orderList = $this->orderManager->getAll();
    $this->addParam('orders', $orderList);
    //$this->View('orderList');
}

public function ShowOrderByUser($id)
{
    $orderList = $this->orderManager->getByUserId($id);
}
/*public function OrderForm()
{
    $this->View("orderForm");
}*/
}