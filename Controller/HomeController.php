<?php
namespace Controller;

class HomeController extends BaseController
{

    public function Home()
    {
        $productController = new ProductController((object) ["manager" => ['Product']]);
        $productElements = $productController->GetProductList();
        $this->addParam('orderElems', $productElements);
        $this->View('home');
    }

}