<?php

require_once 'Models/ProductModel.php';

class ProductsController extends ProductModel{

    public function createProduct($sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length){
        if (!empty($sku) || !empty($name) || !empty($price) || $productTypeId != "Type Switcher") {
            $this->setProduct($this->prepare(new $productTypeId, $sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length));
            
            header("Location: index.php");
        }
    }

    public function delProduct($deleteId){
        foreach($deleteId as $id){
            $this->deleteProduct($id);
        }
        header("Location: index.php");
    }
}
?>