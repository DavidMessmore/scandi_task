<?php

namespace classes;

use classes\products\Dvd;
use classes\products\Furniture;
use classes\products\Book;

class ProductFactory
{
    public static function sortProd($productType)
    {
        $prod = "classes". "\\". "products" . "\\" . ucfirst(strtolower($productType));
        return new $prod;
    }
}