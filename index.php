<?php
require_once "function.php";

//Cridem la funcio per eliminar un contacte
if(isset($_GET["id"])){
  $eliminacontacte = eliminacontacte($_GET["id"]);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css"
  </head>
  <body>
    <h1>Dades contactes</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>

    <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" method="post" action="index.php">
          <button type="button" class="btn btn-success"><a href=nuevocontacto.php>
            <span class="glyphicon glyphicon-plus" aria-hidden="true">
            <span class="glyphicon glyphicon-user" aria-hidden="true">
            </span></a></button>


            <div class="form-group">
              <label>Nom</label>

              <input type="text" class="form-control" name="buscar" placeholder=" ">
            </div>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></button>
        </form>
    </div>

    <?php

    if(isset($_POST['buscar'])){

      $bus = getagenda($_POST['buscar']);
    }else{
      $bus = getagenda(false);
    }

    echo'<table class="table table-hover">';
    echo"<tr>";
      echo "<th>Id</th>";
      echo "<th>Nom</th>";
      echo "<th>Mail</th>";
      echo "<th></th>";
    echo "</tr>";
    foreach($bus as $fila){
      echo "<tr>";
      echo "<td>".$fila['id']."</td><td>".$fila['nom']."</td><td>".$fila['mail']."</td>";
      echo '<td><a href="index.php?id='.$fila['id'].'"><button type="button" class="btn btn-info btn-default btn-sm">X</button></a></td>';
      echo "</tr>";
    }
    echo "</table>";


    if (isset($eliminacontacte) && $eliminacontacte){
      echo '<span>
      <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <p class="bg-success">Contacte  '.$eliminacontacte['nom'].' eliminat</p>
      </span>';

    }elseif(isset($eliminacontacte) && $eliminacontacte==false){
      echo '<span>
      <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <p class="bg-danger">Contacte no eliminat</p>
      </span>';
    }

    ?>

      </div>
    </div>

  </body>
</html>
