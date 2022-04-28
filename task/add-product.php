<?php
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
    <title>Add Product</title>
</head>
<body>
    <header>
        <h1 id="title">Add Product</h1>
    </header>
    <hr>
    <main>
        <form action="add-product.php" method="POST" id="product_form">

            <div class="nav">
                <input type="submit" id="save" name="submit" value="Save" class="button">
                <a href="index.php" id="cancel" class="button">Cancel</a>
            </div>

            <div class="error">
                <?php echo $errors['emptyInput'] ?? $errors['skuMatch'] ?? '' ?>
            </div>

            <div class="wrap">
                <label>SKU</label>
                <input type="text" name="sku" id="sku" value="<?php echo $sku ?? ''?>">
            </div>

            <div class="wrap">
                <label>Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name ?? ''?>" >
            </div>

            <div class="wrap">
                <label>Price ($)</label>
                <input type="number" step="0.01" name="price" id="price" value="<?php echo $price ?? ''?>">
            </div>
            
            <div class="error">
                <?php echo $errors['invalidDataPrice'] ?? '' ?>
            </div>

            <div class="wrap">
                <label>Product Type</label>
                <select id="productType" name="productType">
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>
            
            <div id="card_attr">

                <div id="dvd_attr" class="type_attr">
                    <p><strong>Please provide the size of the DVD-disc</strong></p>
                    <div class="wrap">
                        <label>Size (MB)</label>
                        <input type="number" id="size" name="size">
                    </div>
                    <p><strong>Please provide size in megabytes</strong></p>
                </div>
            
                <div id="furniture_attr" class="type_attr">
                    <div>
                        <p><strong>Please provide dimensions in HxWxL format</strong></p>
                        <div class="wrap">
                            <label>Height (CM)</label>
                            <input type="number" id="height" name="height">
                        </div>
                        <p><strong>Please provide the height in centimeters</strong></p>
                    </div>
            
                    <div>
                        <div class="wrap">
                            <label>Width (CM)</label>
                            <input type="number" id="width" name="width">
                        </div>
                        <p><strong>Please provide the width in centimeters</strong></p>
                    </div>
            
                    <div>
                        <div class="wrap">
                            <label>Length (CM)</label>
                            <input type="number" id="length" name="length">
                        </div>
                        <p><strong>Please provide the length in centimeters</strong></p>
                    </div>
                </div>
              
                <div id="book_attr" class="type_attr">
                    <p><strong>Please provide the weight of the Book</strong></p>
                    <div class="wrap">
                        <label for="">Weight (KG)</label>
                        <input type="number" id="weight" name="weight">
                    </div>
                    <p><strong>Please provide the weight in kilograms</strong></p>
                </div>
            </div>

            <div class="error">
                <?php echo $errors['invalidDataAttr'] ?? '' ?>
            </div>
        </form>
    </main>
    <?php 
        require 'includes/footer.inc.php';
    ?>
</body>
</html>