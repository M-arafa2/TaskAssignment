<?php

include 'autoloader.php';
if(isset($_POST["submit"])) {
    // get the product type
    $type =$_POST["productType"];
    // instantiate a class with that type
    $newproduct = new $type();
    // pass the forum info
    $newproduct->set($_POST);
    // save the object to the db
    $newproduct->save();
    // redirect to main page
    header('Location: /TaskAssignment');
}
