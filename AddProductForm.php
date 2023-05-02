<?php

require_once 'Controllers/ProductController.php';
require_once 'DatabaseConnection.php';

DatabaseConnection::connect('localhost', 'scandiweb', 'root', 'password');

if (isset($_POST['btnSave'])) { /// If save button is clicked
    $controller = new ProductsController();
    $controller->createProduct($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['select'], $_POST['size'], $_POST['weight'], $_POST['height'], $_POST['width'], $_POST['length']);
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Junior Test Kristaps Briks</title>
    <link rel="stylesheet" href="style.css" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-xl mt-3">
        <form method="post" id="product_form">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h1>Product Add</h1>
                </div>
                <div class="col-3 alert alert-danger text-center" role="alert" style="visibility: hidden;" id="errorMessage">
                </div>
                <div class="col-4 justify-content-between">
                    <button type="submit" method="post" class="btn btn-success" name="btnSave" id="btnSave">Save</button>

                    <a href="index.php" class="btn btn-danger" role="button">Cancel</a>
                </div>
            </div>

            <hr>

            <div class="row mt-4 align-items-start">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">SKU</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="sku" name="sku">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Name</label>
                        <div class=" col-sm-4">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Price</label>
                        <div class=" col-sm-4">
                            <input type="number" min="0" step="0.01" class="form-control" id="price" name="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Type Switcher</label>
                        <div class=" col-sm-2">

                            <select class="form-control form-select" name="select" id="productType">
                                <option disabled selected>Type Switcher</option>
                                <option value="Dvd">DVD</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Book">Book</option>
                            </select>

                        </div>
                    </div>

                    <!-- Type Switcher elements -->
                    <div class="option-grouping" id="Dvd" style="display:none;">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Size (MB)</label>
                            <div class=" col-sm-4">
                                <input type="number" min="0" step="1" class="form-control" id="size" name="size">
                            </div>
                        </div>
                        <p class="font-weight-bold">Please, provide size</p>
                    </div>

                    <div class="option-grouping" id="Furniture" style="display:none;">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Height (CM)</label>
                            <div class=" col-sm-4">
                                <input type="number" min="0" step="0.01" class="form-control" id="height" name="height">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Width (CM)</label>
                            <div class=" col-sm-4">
                                <input type="number" min="0" step="0.01" class="form-control" id="width" name="width">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Length (CM)</label>
                            <div class=" col-sm-4">
                                <input type="number" min="0" step="0.01" class="form-control" id="length" name="length">
                            </div>
                        </div>
                        <p class="font-weight-bold">Please, provide dimensions in HxWxL format</p>
                    </div>

                    <div class="option-grouping " id="Book" style="display:none;">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Weight (KG)</label>
                            <div class=" col-sm-4">
                                <input type="number" min="0" step="0.01" class="form-control" id="weight" name="weight">
                            </div>
                        </div>
                        <p class="font-weight-bold">Please, provide weight</p>
                    </div>
                    <!-- End Type Switcher elements -->

                    <script>
                        $('#productType').on('change', function() {
                            var category = $(this).val();
                            $('.option-grouping').css('display', 'none'); //Hide all divs
                            $('#' + category).css('display', ''); //Unhide selected option
                        });
                    </script>
                </div>
            </div>

            <hr>

            <footer class="footer mt-auto py-3 row text">
                <div class="container">
                    <p class="d-flex justify-content-center">Scandiweb Test assignment</p>
                </div>
            </footer>

        </form>
    </div>
</body>
<script src="validation.js"></script>
<script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>