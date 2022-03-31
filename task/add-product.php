<?php
  require "classes/dbh.class.php";
  require "classes/products.class.php";
  require 'abstract/productserroradd.abstract.php';
  require "classes/productscontradd.class.php";
  require "includes/set-product.inc.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <title>Product Add</title>
</head>
<body>
    <header>
      <h1 id="title">Product Add</h1>
    </header>
    <hr>
    <main>
      <form action="add-product.php" method="POST" id="product_form">
        <div class="navList">
          <input type="submit" id="save" name="submit" value="Save" class="button">
          <a href="index.php" id="cancel" class="button">Cancel</a>
        </div>
        <br>
        <div class="erro">
          <?php echo $erros['emptyInput'] ?? $erros['skuMatch'] ?? '' ?>
        </div>
        <div>
          <label>SKU</label>
          <input type="text" name="sku" id="sku" value="<?php echo $sku ?? ''?>"> 
        </div>
            
        <div>
          <label>Name</label>
          <input type="text" name="name" id="name" value="<?php echo $name ?? ''?>" >
        </div>
        <div>
          <label for="">Price ($)</label>
          <input type="number" step="0.01" name="price" id="price" value="<?php echo $price ?? ''?>">
        </div>
        <div class="erro">
          <?php echo $erros['invalidDataPrice'] ?? '' ?>
        </div>

        <div>
          <label>Product Type</label>
          <select id="productType" name="productType">
            <option id ="dvd" value="DVD">DVD</option>
            <option id ="furniture" value="Furniture">Furniture</option>
            <option id ="book" value="Book">Book</option>
          </select>
        </div>
            
        <div id="type_attrs">
          <div class="type_attr">
            <p class="message"><strong>Please provide the size of the DVD-disc</strong></p>
            <label for="">Size (MB)</label>
            <input type="number" id="size" name="size">
            <p><strong>Please provide size in megabytes</strong></p>
          </div>
            
          <div class="type_attr type_attrf">
            <div>
              <p class="message"><strong>Please provide dimensions in HxWxL format</strong></p>
              <label for="">Height (CM)</label>
              <input type="number" id="height" name="height">
              <p><strong>Please provide the height in centimeters</strong></p>
            </div>
                
            <div><label for="">Width (CM)</label>
              <input type="number" id="width" name="width">
              <p><strong>Please provide the width in centimeters</strong></p>
            </div>
                
            <div><label for="">Length (CM)</label>
              <input type="number" id="length" name="length">
              <p><strong>Please provide the length in centimeters</strong></p>
            </div>
          </div>
              
          <div class="type_attr type_attrb">
            <p class="message"><strong>Please provide the weight of the Book</strong></p>
            <label for="">Weight (KG)</label>
            <input type="number" id="weight" name="weight">
            <p><strong>Please provide the weight in kilograms</strong></p>
          </div>
        </div>
        <div class="erro">
          <?php echo $erros['invalidDataAttr'] ?? '' ?>
        </div>
      </form>
    </main>
    <?php 
    require 'includes/footer.inc.php';
    ?>
</body>
</html>