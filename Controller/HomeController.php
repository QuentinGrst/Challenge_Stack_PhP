<?php
namespace Controller;

class HomeController extends BaseController
{

    public function Home($add = 0)
    {
        $productController = new ProductController((object) ["manager" => ['Product']]);
        $productElements = $productController->GetProductList();
        $this->addParam('orderElems', $productElements);
        if ($add == 1) {
            $this->View("home", "Article AJouté au panier", 1);
        } else if ($add == 2) {
            $this->View("home", "Erreur lors de l'ajout");
        } else {
            $this->View('home');
        }
    }

}