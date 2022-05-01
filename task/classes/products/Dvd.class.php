<?php

namespace classes\products;

use classes\abs\BaseProduct;

class Dvd extends BaseProduct
{
    public function setValues(
        $sku,
        $name,
        $price,
        $productType
    ) {
        $this->sku = trim($sku);
        $this->name = trim($name);
        $this->price = trim($price);
        $this->prod_type = trim($productType);
    }

    public function sortAttr()
    {
        $type_attr = htmlspecialchars($_POST["size"]);
        $this->type_attr = trim($type_attr);
    }
    
    public function getErrors()
    {
        if ($this->emptyInput($this->sku, $this->name, $this->prod_type) != false) {
            $this->errors['emptyInput'] = $this->emptyInput($this->sku, $this->name, $this->prod_type);
        } else {
            if ($this->skuMatch($this->sku) != false) {
                $this->errors['skuMatch'] = $this->skuMatch($this->sku);
            }
            if ($this->invalidDataPrice($this->price) != false) {
                $this->errors['invalidDataPrice'] = $this->invalidDataPrice($this->price);
            }
            if($this->invalidDataAttr($this->type_attr) != false) {
            $this->errors['invalidDataAttr'] = $this->invalidDataAttr($this->type_attr);
            }
        }
        return $this->errors;
    }

    public function setAttr($type_attr)
    {
        $this->type_attr = $type_attr;
    }

    public function getAttr()
    {
        return 'Size: '. $this->type_attr .' MG' . "<br>";
    }

    protected function invalidDataAttr($type_attr)
    {
        if (!is_numeric($type_attr)) {
            $result = "The Size must be in numbers";
        } else if(floatval($type_attr) <= 0) {
            $result = "The Size must be greater than 0";
        } else {
            $result = false;
        }
        return $result;
    }
}