<?php

require_once 'Models/Product.php';
require_once 'Models/Products/Dvd.php';
require_once 'Models/Products/Book.php';
require_once 'Models/Products/Furniture.php';
require_once './DatabaseConnection.php';

use Models\Product;

    class ProductModel{
        private $product = array();
        
        public function setProducts(){
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();

            $getProductsSql = "SELECT * FROM product";
            $statement = $dbc->prepare($getProductsSql);
            $statement->execute();
            $items = $statement->fetchAll();
            
            foreach ($items as $row) {
                if ($row['product_type_id'] == 1) {
                    $this->product[] = new Dvd($row['product_id'], $row['sku'], $row['name'], $row['price'], $row['product_type_id'], $row['size']);
                }
                elseif ($row['product_type_id'] == 2) {
                    $this->product[] = new Book($row['product_id'], $row['sku'], $row['name'], $row['price'], $row['product_type_id'], $row['weight']);
                }
                elseif ($row['product_type_id'] == 3) {
                    $this->product[] = new Furniture($row['product_id'], $row['sku'], $row['name'], $row['price'], $row['product_type_id'], $row['height'], $row['width'], $row['length']);
                }
            }
            return $this->product;
        }

        public function prepare(Product $product,  $sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length){
            return $product->prepareProductForDb($sku, $name, $price, $productTypeId, $size, $weight, $height, $width, $length);
        }

        protected function setProduct($products){
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            $insertProductSQL = "INSERT INTO product (sku, name, price, product_type_id, size, weight, height, width, length) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $dbc->prepare($insertProductSQL);
            $statement->execute($products);
        }

        protected function deleteProduct($productId){
            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();
            $deleteProductSQL = "DELETE FROM product WHERE product_id = ? ";
            $statement = $dbc->prepare($deleteProductSQL);
            $statement->execute([$productId]);
        }
    }
