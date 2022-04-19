<?php

namespace classes\products;

use classes\abs\BaseProduct;

class Furniture extends BaseProduct
{
    public function setValues(
        $sku,
        $name,
        $price,
        $productType,
        $type_attr
    ) {
        $this->sku = trim($sku);
        $this->name = trim($name);
        $this->price = trim($price);
        $this->prod_type = trim($productType);
        $this->type_attr = trim($type_attr);

        if ($this->emptyInput($this->sku, $this->name, $this->prod_type) != false) {
            $this->errors['emptyInput'] = $this->emptyInput($this->sku, $this->name, $this->prod_type);
        } else {
            if ($this->skuMatch($this->sku) != false) {
                $this->errors['skuMatch'] = $this->skuMatch($this->sku);
            }
            if ($this->invalidDataPrice($this->price) != false) {
                $this->errors['invalidDataPrice'] = $this->invalidDataPrice($this->price);
            }
            if ($this->invalidDataAttr($this->type_attr) != false) {
                $this->errors['invalidDataAttr'] = $this->invalidDataAttr($this->type_attr);
            }
        }
    }
    
    private function invalidDataAttr($type_attr)
    {
        $dimensions = explode('x', $type_attr);
        $countNotNumeric = 0;
        $countNotPositive = 0;
        foreach ($dimensions as $dim) {
            if (!is_numeric($dim)) {
                $countNotNumeric++;
            } else if (floatval($dim) <= 0) {
                $countNotPositive++;
            }
        }
        if ($countNotNumeric > 0) {
            $result = "The Dimensions must be in numbers";
        } else if ($countNotPositive > 0) {
            $result = "The Dimensions must be greater than 0";
        } else {
            $result = false;
        }
        return $result;
    }
}