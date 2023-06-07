<?php

include 'autoloader.php';
if(isset($_REQUEST["q"])) {
    // the sku to be checked passed by the get request
    $sku =$_REQUEST["q"];
    $model = new model();
    # if sku exist return sku otherwise sku is valid
    if($model->checkSKU($sku) == true) {
        echo $sku;
    } else {
        echo "SKU is Valid";
    }
}
