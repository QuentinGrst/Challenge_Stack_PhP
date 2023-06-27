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
    if (empty($_SESSION["user"]->id)) 
    {
         echo "no user id";
         return false;
    }
    $userId = $_SESSION["user"]->id;
    $orderList = $this->GetOrderByUser($userId);
    $this->addParam('orders', $orderList);
    $this->View('orderList');
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
    $order = $this->orderManager->GetOrderByStatus($userId, 0);
    if(!$order)
    {
        $this->orderManager->create((object) [
            "status"=>0,
            "user_id"=>$userId,
            "datetime"=>(new DateTime())->format('c')
        ]);
        $order = $this->orderManager->GetOrderByStatus($userId, 0);
    }
    return $order->id;
}

public function AddProductToOrder($productId)
{
    $orderId = $this->orderManager->VerifyStatus();
    $res = $this->orderManager->VerifyIfExist($productId,$orderId);
    if($res->num_rows=1)
    {
        $this->orderElementsManager->update([
            "order_id"=>$orderId,
            "quantity"=>$res->quantity+1
        ]);
    }
    else
    {
        $this->orderElementsManager->create([
            "order_id"=>$orderId,
            "product_id"=>$productId,
            "date"=>(new DateTime())->format('c'),
            "quantity"=>1
        ]);
    }
    
    
}

/*public function OrderForm()
{
    $this->View("orderForm");
}*/
}