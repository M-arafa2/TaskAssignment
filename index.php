<?php

include 'product.class.php';
echo "<link rel='stylesheet' type='text/css' href='style.css' />";
?>
<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
</head>
  <body>
    <div id="header">
      <h1 id="index-head">Product list</h1>
      <div class="controllers">
        <button type="button" class="btn btn-dark" id="add">ADD</button>
        <p></p>
        <button type="button" class="btn btn-dark" id ="massDelete">MASS DELETE</button>
      </div>
    </div>
    <div class="row row-cols- row-cols-md-4" id="card">
      <?php

        $model = new model();
        # return array of objects
        $objArray = $model->fetchAll();
        # iterating over the array ,using get to return every object/product info
        foreach($objArray as $key=>$obj) {
            echo"
            <div class='col mb-4'>
              <div class='card'>
                <div class='card-body cardcontr'>
                  <input class='checkboxs form-check-input delete-checkbox' type='checkbox' name ='massdel' value='".$obj->getSku()."'>
                  </br>
                  <p class='card-text'>".$obj->getSKU()." </p>
                  <p class='card-text'>".$obj->getName()." </p>
                  <p class='card-text'>".$obj->getPrice()." $ </p>
                  <p class='card-text'>".$obj->getAttr()." </p>
                </div>
              </div>
            </div>";
}

?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      const addButton = document.getElementById('add');
      const delButton = document.getElementById('massDelete');
      
      addButton.addEventListener('click', function() {
      document.location.href = 'addproduct';
      });
      
      delButton.addEventListener('click', function() {
        // make an array of selected products 
        let checkboxes = document.querySelectorAll('input[name="massdel"]:checked');
        let values = [];
        checkboxes.forEach((checkbox) => {
          // save selected products sku into array
          values.push(checkbox.value);
          //unselect checkboxs
          checkbox.checked =false;
        });
        sendData(values);
        
      });
      function sendData(data) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.controller.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");

      //upon receiving respone
      xhr.onreadystatechange = function () {
          if (xhr.readyState == XMLHttpRequest.DONE) {
            window.location.reload();
          }
      };

      //send the data
      xhr.send(JSON.stringify(data));
}
    </script>
  </body
</html>