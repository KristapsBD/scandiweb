<?php

require_once 'Models/Product.php';

use Models\Product;

class Book extends Product{

    private $weight;

    public function __construct($id="", $sku="", $name="", $price="", $productTypeId="", $weight="") {
        
        parent::__construct($id, $sku, $name, $price, $productTypeId);
        $this->weight = $weight;
    }

    public function getAdditionalInfo(){

        return "Weight: ".$this->weight." KG";
        
    }
    function prepareProductForDb($sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length){

        $products = [];

        $size ="";
        $height ="";
        $width="";
        $length="";
        $productTypeId = 2;

        if ($weight > 0 || !empty($weight)) {
            array_push($products, $sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length);
            return $products;
        }   
    }   
}