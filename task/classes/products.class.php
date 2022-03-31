<?php
    // my model
    class Products extends Dbh {

        protected function getProducts(){
            $sql = "SELECT * FROM products";
            $stmt = $this->connect()->query($sql);
            $products = $stmt->fetchAll();
            return $products;
        }

        protected function setProduct($sku, $name, $price, $prod_type, $type_attr){
            $sql = "INSERT INTO products(sku, name, price, prod_type, type_attr) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$sku, $name, $price, $prod_type, $type_attr]);
            $stmt = null;
        }

        protected function delProduct($id){
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }

        protected function checkSku($sku) {
            $stmt = $this->connect()->prepare("SELECT name FROM products WHERE sku = ?");
            $stmt->execute([$sku]);

            $resultCheck = "";
            if($stmt->rowCount() > 0){
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

            return $resultCheck;
        }

    }