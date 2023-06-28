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
            $result = $this->orderElementsManager->update((object)[
                "id"=>$res->id,
                "quantity"=>$res->quantity+1
            ]);
        }
        else
        {
            $result = $this->orderElementsManager->create((object)[
                "order_id"=>$orderId,
                "product_id"=>$productId,
                "quantity"=>1
            ]);
        }
        $homeController = new homeController((object) ["controller" => 'home']);
        if ($result) {
            $homeController->Home(1);
        } else {
            $homeController->Home(2);
        }
    }
}