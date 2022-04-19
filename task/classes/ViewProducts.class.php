<?php

namespace classes;

use classes\abs\Dbh;

class ViewProducts extends Dbh
{
    private $products;

    public function showProducts()
    {
        $this->products = $this->getProducts();
        $products = $this->products;
        return $products;
    }

    public function updateProductAttr($product)
    {
        if ($product['prod_type'] == "Furniture") {
            $product['type_attr'] = 'Dimension: '. $product['type_attr'];
        } else if ($product['prod_type'] == "Book") {
            $product['type_attr'] = 'Weight: '. $product['type_attr'] . ' KG';
        } else {
            $product['type_attr'] = 'Size: '. $product['type_attr'] .' MG';
        }
        return $product['type_attr'];
    }

    private function getProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);
        $products = $stmt->fetchAll();
        return $products;
    }
}