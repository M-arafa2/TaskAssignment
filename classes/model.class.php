<?php

include 'classes/product.class.php';
#this model class is for rest of db operations (fetch db,delete and check if sku exist)
#since fetching is as objects need instance of class to access properities
#and abstract classes cant be instantiated
class model extends product
{
    #array of products sku to be deleted
    private $deletedProducts;
    #fetch all products from db as array of objects
    public function fetchAll()
    {
        $sql = "SELECT *FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, "model");
        return $result;
    }
    #delete products filtered by sku
    public function massDelete()
    {
        foreach($this->deletedProducts as $product) {
            $sql = "DELETE FROM product WHERE sku=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$product]);
        }
    }
    #check if sku exist in the db to alert user
    #even without the function it still wouldnt allow duplication cuz of unique property
    #but its for showing a notification to the user
    public function checkSKU($sku)
    {
        $sql = "SELECT *FROM product WHERE sku=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);
        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    #the array of sku for products to be deleted
    # returned from massdelete button and selected checkboxs
    public function set($array)
    {
        $this->deletedProducts = $array;
    }
    #getters
    public function getSKU()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getAttr()
    {
        return $this->specialAttribute;
    }
}
