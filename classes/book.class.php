<?php

include 'classes/product.class.php';
class book extends product
{
    public function set($sumbitArray)
    {
        $this->sku = $sumbitArray["sku"];
        $this->name = $sumbitArray["name"];
        $this->price = $sumbitArray["price"];
        $this->productType = $sumbitArray["productType"];
        #saving the entire description so upon fetching,there will be no need to differentiate types
        $this->specialAttribute ="Weight: ". $sumbitArray["weight"] ."KG";
    }
}
