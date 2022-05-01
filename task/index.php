<?php
    require "includes/del-product.inc.php";
    use classes\ViewProducts as ViewProducts;
    use classes\ProductFactory as ProductFactory;
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
        <div class="error_index">
            <?php echo $errorDelete ?? ""; ?>
        </div>
        <form action="index.php" method="POST" id="display">
            <div class="nav_index">
                <a href="add-product.php" id="add" class="button">ADD</a>
                <input type="submit" id="delete" name="submit" value="MASS DELETE" class="button">
            </div>
            <ul class="prod_grid">
                <?php
                    $view = new ViewProducts;
                    $results = $view->showProducts();
                    foreach ($results as $result) { 
                        $product = ProductFactory::sortProd($result['prod_type']);
                        $product->setValues($result['sku'], $result['name'], $result['price'], $result['prod_type']);
                        $product->setAttr($result['type_attr']);
                ?>
                <li class="prod_card">
                    <input type="checkbox" class="delete-checkbox" name="delete[]" value=<?php echo $result['id']; ?>>
                    <?php 
                        echo $product->getSku();
                        echo $product->getName();
                        echo $product->getPrice();
                        echo $product->getAttr();
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