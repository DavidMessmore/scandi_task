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

    private function getProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);
        $products = $stmt->fetchAll();
        return $products;
    }
}