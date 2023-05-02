<?php

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'DatabaseConnection.php';
require_once ROOT_PATH . 'Views/ProductsView.php';
require_once ROOT_PATH . 'Controllers/ProductController.php';

DatabaseConnection::connect('localhost', 'scandiweb', 'root', 'password'); /// Singleton design pattern

if (isset($_POST['btnDelete'])) { /// If delete button is clicked
    if (isset($_POST['delete'])) {
        $controller = new ProductsController();
        $controller->delProduct($_POST['delete']);
    }
}
?>

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Junior Test Kristaps Briks</title>

    <link rel="stylesheet" href="style.css" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <!-- Begin page content -->
    <div class="container-xl mt-3">
        <form method="post">
            <div class="row justify-content-between">

                <div class="col-4">
                    <h1>Product List</h1>
                </div>
                <div class="col-4 ">

                    <a href="AddProductForm.php" class="btn btn-success mr-4">ADD</a>
                    <button type="submit" class="btn btn-danger" id="delete-product-btn" name="btnDelete">MASS DELETE</button>
                </div>

            </div>

            <hr>

            <div class="row mt-4">
                <?php

                $products = new ProductsView();


                $allProducts = $products->showProducts();

                if (count($allProducts) > 0) {

                    foreach ($allProducts as $product) {
                ?>
                        <div class="col-3 mb-3">
                            <div class=" p-4 card-border text">
                                <input type="checkbox" class="delete-checkbox" name="delete[]" value='<?= $product->getId() ?>'>
                                <?php
                                echo "<p>" . $product->getSku() . "</p>";
                                echo "<p>" . $product->getName() . "</p>";
                                echo "<p>" . $product->getPrice() . " $</p>";
                                echo "<p>" . $product->getAdditionalInfo() . "</p>";
                                ?>

                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </form>

        <hr>
    </div>

    <footer class="footer mt-auto py-3 row text">
        <div class="container">
            <p class="d-flex justify-content-center">Scandiweb Test assignment</p>
        </div>
    </footer>


    <script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>