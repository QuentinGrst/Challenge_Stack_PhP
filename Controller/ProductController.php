<?php

namespace Controller;

use Exception;

class ProductController extends BaseController
{

    public function ShowProductList()
    {
        $productList = $this->productManager->getAll();
        $this->addParam('products', $productList);
        $this->View('productList');
    }

    public function GetProductList()
    {
        return $this->productManager->getAll();
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

    public function SearchProducts($search)
    {
        if ($search) {
            $productList = $this->productManager->SearchProductsWithInput($search);
        } else {
            $productList = $this->productManager->getAll();
        }
        $this->addParam('products', $productList);
        $this->View('productList');
    }
    
    public function AddPicture()
    {
        $target_dir = "image/product/";
        $file = pathinfo(basename($_FILES["file"]["name"]));

        $target_file = $target_dir . $file["filename"] . "-" . time() . "." . $file["extension"];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            throw new Exception("Le format d'image n'est pas accepté");
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $response = new \stdClass();
            $response->success = true;
            $response->url = "/" . $target_file;
            echo json_encode($response);
        }
    }
}
