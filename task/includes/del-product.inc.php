<?php

require_once "class-autoloader.inc.php";

use classes\DeleteProduct as DeleteProduct;

if (isset($_POST["submit"])) {
    $errorDelete = "";
    if (isset($_POST["delete"])) {
        $idAll = $_POST["delete"];
        $deleteProduct = new DeleteProduct();
        foreach ($idAll as $id) {
            $id = htmlspecialchars($id);
            $deleteProduct->eraseProduct($id);
        }
    } else {
        $errorDelete = "Please select the products to delete";
    }
}