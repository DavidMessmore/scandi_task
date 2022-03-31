<?php 
    // my control for del
    class ProductsContrDel extends Products {
     
        public function eraseProduct($id){

            $this->delProduct($id);
        }
    }


