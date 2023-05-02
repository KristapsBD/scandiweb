<?php
 
namespace Models;

abstract class Product{
    private $id;
    private $sku;
    private $name;
    private $price;
    private $productTypeId;

    public function __construct($id="", $sku="", $name="", $price="", $productTypeId=""){
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productTypeId = $productTypeId;
    }

    public abstract function getAdditionalInfo();
    public abstract function prepareProductForDb($sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length);
    public function getId(){
        return $this->id;
    }
    public function getSku(){
        return $this->sku;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getProductType(){
        return $this->productTypeId;
    }
}