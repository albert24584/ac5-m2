<?php
require_once "function.php"
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nuevo contacto</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css"
  </head>
  <body>
      <h1>Nou contacte</h1>
      <div class="container">
        <div class="row">
    <form action="" method="post" class="form-horizontal">
      <button type="button" class="btn btn-success"><a href=index.php><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></a></button>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
        <div class="col-xs-4">
          <input type="text" class="form-control" id="inputEmail3" name="nom">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Mail</label>
        <div class="col-xs-4">
          <input type="mail" class="form-control" id="inputPassword3" name="mail">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Crear</button>
        </div>
      </div>
    </form>

      <div class="container">
        <div class="row">
          <div class="col-md-3 col-md-offset-3">
        <?php

        if(isset($_POST['nom'])){

          $crear = afegircontacte($_POST['nom'],$_POST['mail']);

          if ($crear){
            echo '<p class="text-primary">No s\'ha pogut afegir el contacte</p>';
          }else{
            echo '<p class="bg-primary">Contacte creat!!</p>';
          }
        }

         ?>
        </div>
       </div>
     </div>
   </div>
 </div>

  </body>
</html>
