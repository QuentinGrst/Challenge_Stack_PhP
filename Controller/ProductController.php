<?php

namespace Controller;

use Exception;

class ProductController extends BaseController
{

    public function ShowProductList()
    {
        $productList = $this->productManager->GetAllProducts();
        $this->addParam('products', $productList);
        $this->View('productList');
    }

    public function GetProductList()
    {
        return $this->productManager->GetAllProducts();
    }

    public function ProductForm()
    {
        $this->View("productForm");
    }

    public function CreateProduct($name, $description, $price, $picture)
    {
        $add = $this->productManager->create((object) [
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "picture" => $picture,
            "seller_id" => $_SESSION["user"]->id
        ]);

        if ($add) {
            $this->View("productForm", "Ajout effectué avec succès", 1);
        } else {
            $this->View("productForm", "Erreur lors de l'ajout");
        }
    }

    public function SearchProducts($search)
    {
        if ($search) {
            $productList = $this->productManager->SearchProductsWithInput($search);
        } else {
            $productList = $this->productManager->GetAllProducts();
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

    public function ProductInventory()
    {
        if ($_SESSION['user']->role == 'admin')
        {
            $productList = $this->productManager->GetAllProducts();
            $archived = $this->productManager->GetAllArchived();
        } else {
            $productList = $this->productManager->GetAllProductsInventory();
            $archived = $this->productManager->GetAllArchivedInventory();
        }
        
        $this->addParam('products', $productList);
        $this->addParam('archived', $archived);
        $this->View('productInventory');
    }

    public function ArchiveProduct($id)
    {
        $product = $this->productManager->getById($id);
        $role = $_SESSION['user']->role;
        if (($role == "admin") || ($role == "seller" && $product->seller_id == $_SESSION['user']->id))
        {
            if ($product->state) {
                $this->productManager->archiveProduct($id);
            } else {
                $this->productManager->unArchiveProduct($id);
            }
        }
        header("Location: /Product/Inventaire");
    }
}