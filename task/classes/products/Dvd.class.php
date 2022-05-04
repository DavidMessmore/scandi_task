<?php

namespace classes\products;

use classes\abs\BaseProduct;

class Dvd extends BaseProduct
{
    public function sortAttr()
    {
        $type_attr = htmlspecialchars($_POST["size"]);
        $this->type_attr = trim($type_attr);
        if (!isset($this->errors['emptyInput'])) {
            if ($this->invalidDataAttr($this->type_attr) != false) {
                $this->errors['invalidDataAttr'] = $this->invalidDataAttr($this->type_attr);
            }
        }
    }

    public function getAttr()
    {
        return 'Size: '. $this->type_attr .' MG' . "<br>";
    }

    protected function invalidDataAttr($type_attr)
    {
        if (!is_numeric($type_attr)) {
            $result = "The Size must be in numbers";
        } else if (floatval($type_attr) <= 0) {
            $result = "The Size must be greater than 0";
        } else {
            $result = false;
        }
        return $result;
    }
}