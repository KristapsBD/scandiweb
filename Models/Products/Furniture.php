<?php

require_once 'Models/Product.php';

use Models\Product;

class Furniture extends Product{

    private $height;
    private $width ;
    private $length ;

    public function __construct($id="", $sku="", $name="", $price="", $productTypeId="", $height="", $width="", $length="") {
        
        parent::__construct($id, $sku, $name, $price, $productTypeId);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function getAdditionalInfo(){

        return "Dimensions: ".$this->height."x".$this->width."x".$this->length;
        
    }
    function prepareProductForDb($sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length){

        $products = [];

        $weight = "";
        $size = "";
        $productTypeId = 3;

        if (($height > 0 || !empty($height) || $height > 0 || !empty($height) || $height > 0 || !empty($height))) {
            array_push($products, $sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length);
            return $products;
        }
    }  
}