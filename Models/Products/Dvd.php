<?php

require_once 'Models/Product.php';

use Models\Product;

class Dvd extends Product{

    private $size;

    public function __construct($id="", $sku="", $name="", $price="", $productTypeId="", $size="") {
        
        parent::__construct($id, $sku, $name, $price, $productTypeId);
        $this->size = $size;
    }

    public function getAdditionalInfo(){

        return "Size: ".$this->size." MB";
        
    }

    function prepareProductForDb($sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length){

        $products = [];

        $weight ="";
        $height ="";
        $width="";
        $length="";
        $productTypeId = 1;

        if ((!empty($size) || $size > 0)) {
            array_push($products, $sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length);
            return $products;
        }   
    }   
}