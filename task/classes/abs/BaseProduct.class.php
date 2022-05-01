<?php 

namespace classes\abs;

abstract class BaseProduct extends Dbh
{
    protected $sku;
    protected $name;
    protected $price;
    protected $prod_type;
    protected $type_attr;
    protected $errors = [];

    abstract public function setValues(
        $sku,
        $name,
        $price,
        $productType
    );
    
    abstract public function sortAttr();
    
    abstract protected function invalidDataAttr($type_attr);
    
    abstract public function getAttr();
    
    abstract public function setAttr($type_attr);
    
    abstract public function getErrors();

    private function setProduct($sku, $name, $price, $prod_type, $type_attr)
    {
        $sql = "INSERT INTO products(sku, name, price, prod_type, type_attr) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku, $name, $price, $prod_type, $type_attr]);
        $stmt = null;
    }

    private function checkSku($sku)
    {
        $stmt = $this->connect()->prepare("SELECT name FROM products WHERE sku = ?");
        $stmt->execute([$sku]);
        $resultCheck = "";
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    public function emptyInput($sku, $name, $prod_type)
    {
        $result = "";
        if (empty($sku) || empty($name) || empty($prod_type)) { 
            $result = "Please submit the required data";
        } else {
            $result = false;
        }
        return $result;
    }

    public function skuMatch($sku)
    {
        $result = "";
        if ($this->checkSku($sku)) {
            $result = false;
        } else {
            $result = "The SKU submitted already exists";
        }
        return $result;
    }

    public function invalidDataPrice($price)
    {
        $result = "";
        if (!is_numeric($price)) {
            $result = "The Price must be a number";
        } else if (floatval($price) <= 0) {
            $result = "The Price must be greater than 0";
        } else {
            $result = false;
        }
        return $result;
    }

    public function getSku()
    {
        return $this->sku . "<br>";
    }

    public function getName()
    {
        return $this->name . "<br>";
    }

    public function getPrice()
    {
        return $this->price . "$". "<br>";
    }

    public function createProduct()
    {
        if (empty($this->errors)) {
            $this->setProduct($this->sku, $this->name, $this->price, $this->prod_type, $this->type_attr);
        } else {
            return false;
        }
    }
}