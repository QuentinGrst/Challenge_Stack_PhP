<?php
require_once '/Model/ProductManager.php';

$productManager = new \Model\ProductManager();
$products = $productManager->GetAllProducts($productId);

foreach ($products as $product) {
    echo '<h2>' . $product->name . '</h2>';
    echo '<p>Prix : $' . $product->price . '</p>';
    echo '<p>' . $product->description . '</p>';
    echo '<input>' . $product->id . '</input>';
}
?>
