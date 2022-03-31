<?php

if(isset($_POST["submit"])){
    $errorDelete = "";
    if(isset($_POST["delete"])){
        $idAll = $_POST["delete"];
        $deleteProduct = new ProductsContrDel();
        foreach($idAll as $id){
            htmlspecialchars($id);
            $deleteProduct->eraseProduct($id);
        }
    } else {
        $errorDelete = "Please select the products to delete";
    }
}