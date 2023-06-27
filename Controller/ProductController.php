<?php
namespace Controller;

class ProductController extends BaseController
{

    public function ShowProductList()
    {
        $productList = $this->productManager->getAll();
        $this->addParam('products', $productList);
        $this->View('productList');
    }

    public function ProductForm()
    {
        $this->View("productForm");
    }

    public function CreateProduct($name, $description, $price, $id)
    {
        $this->productManager->create((object)[ 
            "name" => $name, 
            "description" => $description, 
            "price" => $price
        ]);
    }
}