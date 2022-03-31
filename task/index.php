<?php
    require "classes/dbh.class.php";
    require "classes/products.class.php";
    require "classes/productsview.class.php";
    require "classes/productscontrdel.class.php";
    require "includes/del-product.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Product List</title>
</head>
<body>
    <header>
        <h1 id="title">Product List</h1>
    </header>
    <hr>
    <main>
        <div class="erro_delete">
            <?php echo $errorDelete ?? ""; ?>
        </div>
        <form action="index.php" method="POST" id="display">
            <div class="nav">
                <a href="add-product.php" id="add-product-btn" class="button">ADD</a>
                <input type="submit" id="delete-product-btn" name="submit" value="MASS DELETE" class="button">
            </div>
            <ul>
            <?php
                $view = new ProductsView;
                $results = $view->showProducts();
                foreach($results as $result){ 
            ?>

            <li>
            <input type="checkbox" class="delete-checkbox" name="delete[]" value=<?php echo $result['id']; ?>>
            <?php 
                echo $result['sku'].'<br>';
                echo $result['name'].'<br>';
                echo $result['price'].' $'.'<br>';
                echo $view->updateProductsAttr($result).'<br>';
            ?>
            </li>
            <?php } ?>
            </ul>
        </form>
    </main>
    <?php 
        require "includes/footer.inc.php";
    ?>
</body>
</html>