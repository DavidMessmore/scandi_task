<?php

namespace classes\products;

use classes\abs\BaseProduct;

class Book extends BaseProduct
{
    public function sortAttr()
    {
        $type_attr = htmlspecialchars($_POST["weight"]);
        $this->type_attr = trim($type_attr);
        if (!isset($this->errors['emptyInput'])) {
            if ($this->invalidDataAttr($this->type_attr) != false) {
                $this->errors['invalidDataAttr'] = $this->invalidDataAttr($this->type_attr);
            }
        }
    }

    public function getAttr()
    {
        return 'Weight: '. $this->type_attr . ' KG' . "<br>";
    }

    protected function invalidDataAttr($type_attr)
    {
        if (!is_numeric($type_attr)) {
            $result = "The Weight must be in numbers";
        } else if (floatval($type_attr) <= 0) {
            $result = "The Weight must be greater than 0";
        } else {
            $result = false;
        }
        return $result;
    }
}