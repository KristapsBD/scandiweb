<?php

require_once 'Models/ProductModel.php';

class ProductsView extends ProductModel{
    public function showProducts(){
        return $this->setProducts();
    }
}