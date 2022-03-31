<?php
    // my view
    class ProductsView extends Products {
        private $products;

        public function showProducts(){
            $this->products = $this->getProducts();
            
            return $this->products;
        }
        public function updateProductsAttr($result){
            if ($result['prod_type'] == "Furniture") {
                $result['type_attr'] = 'Dimension: '. $result['type_attr'];
            } else if ($result['prod_type'] == "Book"){
                $result['type_attr'] = 'Weight: '. $result['type_attr'] . ' KG';
            } else {
                $result['type_attr'] = 'Size: '. $result['type_attr'] .' MG';
            }
            return $result['type_attr'];
        }
    }