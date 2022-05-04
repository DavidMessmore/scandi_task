<?php 

require "includes/class-autoloader.inc.php";

use classes\ProductFactory as ProductFactory;

if (isset($_POST["submit"])) {

    $sku = htmlspecialchars($_POST["sku"]);
    $name = htmlspecialchars($_POST["name"]);
    $price = htmlspecialchars($_POST["price"]);
    $productType = htmlspecialchars($_POST["productType"]);

    $product = ProductFactory::sortProd($productType);
    $product->setValues($sku, $name, $price, $productType);
    $product->sortAttr();
    $errors = $product->getErrors();

    $product->createProduct();

    if (!array_filter($errors)) {
        header("location: index.php");
    }
}