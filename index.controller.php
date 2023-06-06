<?php

include 'product.class.php';
// receiving the array of selected products/checkboxs sku
$data = json_decode(file_get_contents("php://input"), true);
$model = new model();
//passing it to the model class
$model->set($data);
// calling the delete function
$model->massDelete();
//reloading the page
header('Location: index.php');
