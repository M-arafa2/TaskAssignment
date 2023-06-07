<?php

include 'classes/product.class.php';
class furniture extends product
{
    public function set($sumbitArray)
    {
        $this->sku = $sumbitArray["sku"];
        $this->name = $sumbitArray["name"];
        $this->price = $sumbitArray["price"];
        $this->productType = $sumbitArray["productType"];
        #saving the entire description so upon fetching,there will be no need to differentiate types
        $this->specialAttribute = "Dimension: ". $sumbitArray["height"]. "X" . $sumbitArray["width"] . "X" .$sumbitArray["length"];
    }
}
