<?php

namespace classes\products;

use classes\abs\BaseProduct;

class Furniture extends BaseProduct
{
    public function sortAttr()
    {
        $type_attr = $_POST["height"] . "x" . $_POST["width"] . "x" . $_POST["length"];
        $type_attr = trim(htmlspecialchars($type_attr));
        $this->type_attr = $type_attr;
        if (!isset($this->errors['emptyInput'])) {
            if ($this->invalidDataAttr($this->type_attr) != false) {
                $this->errors['invalidDataAttr'] = $this->invalidDataAttr($this->type_attr);
            }
        }
    }

    public function getAttr()
    {
        return 'Dimension: '. $this->type_attr . "<br>";
    }

    protected function invalidDataAttr($type_attr)
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