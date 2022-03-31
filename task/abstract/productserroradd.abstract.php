<?php 

abstract class ProductsErrorAdd extends Products{

    public function emptyInput($sku, $name, $prod_type) {
        $result = "";
        if(empty($sku) || empty($name) || empty($prod_type)){ 
            $result = "Please submit the required data";
        } else {
         $result = false;
        }
        return $result;
    }

    public function skuMatch($sku) {
        $result = "";
        if ($this->checkSku($sku)){
            $result = false;
        } else {
            $result = "The SKU submitted already exists";
        }
    return $result;
}

    public function invalidDataPrice($price){
        $result = "";
        if(!is_numeric($price)){
            $result = "The Price must be a number";
        } else if (floatval($price) <= 0) {
            $result = "The Price must be greater than 0";
        } else {
            $result = false;
        }
        return $result;
    }

    public function invalidDataAttr($prod_type, $type_attr){
        $result = "";
        if($prod_type == "Furniture"){
            $dims = $type_attr;
            $dimssep = explode('x', $dims);
            $countN = 0;
            $countG = 0;
            foreach($dimesep as $dim){
                if(!is_numeric($dim)){
                    $countN++;
                } else if(floatval($dim) <= 0){
                    $countG++;
                }
            }
            if ($countN > 0){
                $result = "The Dimensions must be in numbers";
            } else if($countG > 0) {
                $result = "The Dimensions must be greater than 0";
            } else {
                $result = false;
            }
        } else if($prod_type == "Book") {
            if(!is_numeric($type_attr)){
                $result = "The Weight must be in numbers";
            } else if(floatval($type_attr) <= 0) {
                $result = "The Weight must be greater than 0";
            } else {
                $result = false;
            }
        } else if($prod_type == "DVD"){
            if(!is_numeric($type_attr)){
                $result = "The Size must be in numbers";
            } else if(floatval($type_attr) <= 0) {
                $result = "The Size must be greater than 0";
            } else {
                $result = false;
            }
        }
        return $result;
    }
}


