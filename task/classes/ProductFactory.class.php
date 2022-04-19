<?php

namespace classes;

use classes\products\Dvd as Dvd;
use classes\products\Furniture as Furniture;
use classes\products\Book as Book;

class ProductFactory
{
    public static function sortProd($productType)
    {
        if ($productType == "DVD") {
            $product = new Dvd;
        } else if ($productType == "Furniture") {
            $product = new Furniture;
        } else if ($productType == "Book") {
            $product = new Book;
        }
        return $product;
    }

    public static function setAttr($productType)
    {
        if ($productType == "DVD") {
            $type_attr = htmlspecialchars($_POST["size"]);
            return $type_attr;
        } else if ($productType == "Furniture") {
            $type_attr = $_POST["height"] . "x" . $_POST["width"] . "x" . $_POST["length"];
            $type_attr = htmlspecialchars($type_attr);
            return $type_attr;
        } else if ($productType == "Book") {
            $type_attr = htmlspecialchars($_POST["weight"]);
            return $type_attr;
        }

    }

}