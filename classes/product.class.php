<?php

include 'classes/db.class.php';
#the main abstract class for products
abstract class product extends db
{
    # id is auto incremented in db and doesnt accept inputs,its only for getting objects from db
    protected $id;
    #sku has unique property in db and doesnt accept duplication
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;
    #special attribute for all types saves as one field in the db
    protected $specialAttribute;
    #must have in all classes that inherit this class
    abstract public function set($array);

    #since special attribute is one field,all types share the same save function
    public function save()
    {
        $sql = "INSERT INTO product (sku, name, price, productType, specialAttribute) VALUES (?,?,?,?,?)";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$this->sku, $this->name, $this->price, $this->productType,$this->specialAttribute]);
    }

}
