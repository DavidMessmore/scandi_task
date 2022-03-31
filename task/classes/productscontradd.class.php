<?php 
    // my control for add
    class ProductsContrAdd extends ProductsErrorAdd {
        private $sku;
        private $name;
        private $price;
        private $prod_type;
        private $type_attr;
        private $errors = [];

        public function __construct($sku, $name, $price, $productType, $type_attr) {
            $this->sku = trim($sku);
            $this->name = trim($name);
            $this->price = trim($price);
            $this->prod_type = trim($productType);
            $this->type_attr = trim($type_attr);
        }

        public function createProduct() {
            if(empty($this->errors)) {
                $this->setProduct($this->sku, $this->name, $this->price, $this->prod_type, $this->type_attr);
            } else {
            }
        }

        public function getErrors(){
            if($this->emptyInput($this->sku, $this->name, $this->prod_type) != false) {
                $this->errors['emptyInput'] = $this->emptyInput($this->sku, $this->name, $this->prod_type);
            } else {
                if($this->skuMatch($this->sku) != false) {
                    $this->errors['skuMatch'] = $this->skuMatch($this->sku);
                }
                if($this->invalidDataPrice($this->price) != false) {
                    $this->errors['invalidDataPrice'] = $this->invalidDataPrice($this->price);
                }
                if($this->invalidDataAttr($this->prod_type, $this->type_attr) != false) {
                    $this->errors['invalidDataAttr'] = $this->invalidDataAttr($this->prod_type, $this->type_attr);
                }
            }
            return $this->errors;
        }
        
    }