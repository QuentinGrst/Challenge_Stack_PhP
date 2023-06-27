<?php
namespace Controller;
use DateTime;

class OrderElementsController extends BaseController{

    public function GetOrderElementsByUser($id)
    {
        return $this->orderElementsManager->getByUserId($id);
    }

    public function GetElementsByOrder($id)
    {
        return $this->orderElementsManager->getByOrderId($id);
    }

    public function AddProductToOrder($productId)
    {
        $orderController = new orderController((object) ["manager" => ['Order']]);
        $orderId = $orderController->VerifyStatus();
        $res = $this->orderElementsManager->VerifyIfExist($productId,$orderId);
        if($res && $res->num_rows=1)
        {
            $this->orderElementsManager->update((object)[
                "id"=>$res->id,
                "quantity"=>$res->quantity+1
            ]);
        }
        else
        {
            $this->orderElementsManager->create((object)[
                "order_id"=>$orderId,
                "product_id"=>$productId,
                "date"=>(new DateTime())->format('c'),
                "quantity"=>1
            ]);
        }
        
        
    }
}