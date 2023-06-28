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

public function ShowUserOrders()
{
    if (empty($_SESSION["user"]->id)) {
        echo "no user id";
        return false;
    }
    $userId = $_SESSION["user"]->id;
    $orderList = $this->GetOrderByUser($userId);
    $orderElementsController = new OrderElementsController((object) ["manager" => ['OrderElements']]);
    $orderElements = $orderElementsController->GetOrderElementsByUser($userId);

    $this->addParam('orders', $orderList);
    $this->addParam('orderElems', $orderElements);
    $this->View('orderList');
}

public function ShowBasket()
{
    if (empty($_SESSION["user"]->id)) {
        echo "no user id";
        return false;
    }
    $userId = $_SESSION["user"]->id;
    $orderElementsController = new OrderElementsController((object) ["manager" => ['OrderElements']]);
    $orderElements = $orderElementsController->GetElementsByOrder($userId);
    $this->addParam('orderElems', $orderElements);
    $this->View('basket');
}

public function GetOrderByUser($id)
{
    return $this->orderManager->getByUserId($id);
}

public function VerifyStatus()
{
    if (empty($_SESSION["user"]->id)) {
        echo "no user id";
        return false;
    }
    $userId = $_SESSION["user"]->id;
    $order = $this->orderManager->GetOrderByStatus($userId, 0)[0];
    if(!$order)
    {
        $this->orderManager->create((object) [
            "status"=>0,
            "user_id"=>$userId,
            "datetime"=>(new DateTime())->format('c')
        ]);
        $order = $this->orderManager->GetOrderByStatus($userId, 0)[0];
    }
    return $order->id;
}



/*public function OrderForm()
{
    $this->View("orderForm");
}*/
}