<?php 

    if(isset($_POST["submit"])){
        
        // grabbing the data
        $sku = htmlspecialchars($_POST["sku"]);
        $name = htmlspecialchars($_POST["name"]);
        $price = htmlspecialchars($_POST["price"]);
        if($_POST["productType"] == "DVD") {
            $productType = htmlspecialchars($_POST["productType"]);
            $type_attr = htmlspecialchars($_POST["size"]);
        } else if ($_POST["productType"] =="Furniture"){
             $productType = htmlspecialchars($_POST["productType"]);
            $type_attr = $_POST["height"] . "x" . $_POST["width"] . "x" . $_POST["length"];
            $type_attr = htmlspecialchars($type_attr);
        } else if ($_POST["productType"] == "Book"){
             $productType = htmlspecialchars($_POST["productType"]);
            $type_attr = htmlspecialchars($_POST["weight"]);
        }

        // instantiate ProductsContr class

        $product = new ProductsContrAdd($sku, $name, $price, $productType, $type_attr);

        // running error handlers and creating product

        $erros = $product->getErrors();
        $product->createProduct();

        // going back to front page header
        if(!array_filter($erros)){
            header("location: index.php");
        }
   }
