<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Crear BD en cole</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/dashboard/dashboard.css"
  </head>
  <body>
    <h1>Crear BD de contactos</h1>
    <?php
    //Conectar con la base de datos
      try{
        $con = new PDO("mysql:host=localhost","root");
      }catch(PDOException $e){
        echo "<p>Error:".$e->getMessage()."</p>";
        echo "</body></html>";
        die();
      }
     ?>

     <p class="text-primary">Conexion establecida con mariadb</p>;
     <?php

     //Creamos la base de datos

       $con->exec("drop database agenda;");
       $sql = "create database agenda;";
       $res = $con->exec($sql);
       //Mostramos un mensage
       if(!$res){
         echo '<p class="bg-danger">No s\'ha pogut crear la base de dades</p>';
         echo "<p>".$con->errorinfo()[2]."</p>";
       }else{
         echo '<p class="text-primary">Base de dades creada</p>';
       }

     //Establir conexió

       $sql = "use agenda;";
       $res = $con->exec($sql);
       if($res===false){
         echo '<p class="bg-danger">Conexio amb BD contactes no establerta</p>';
         echo "<p>".$con->errorinfo()[2]."</p>";
       }else{
         echo '<p class="text-primary">Conexio amb BD contactes establerta</p>';
       }

       //Crear taula contactes

       $sql_contactes = "create table contactes(
         id integer primary key auto_increment,
         nom varchar(30) not null,
         mail varchar(30) not null,
         UNIQUE (mail)
       );";

       $res = $con->exec($sql_contactes);
       if($res===false){
         echo '<p class="bg-danger">No s\'ha pogut crear la taula contactes</p>';
         echo "<p>".$con->errorinfo()[2]."</p>";
       }else{
         echo '<p class="text-primary">Taula de contactes creada!!!</p>';
       }

       //Crear taula relacio

       $sql_relacio = "create table relacio(
         id_conocedor integer,
         id_conocido integer,
         primary key (id_conocedor,id_conocido),
         foreign key (id_conocedor) references contactes(id) ON DELETE CASCADE,
         foreign key (id_conocido) references contactes(id) ON DELETE CASCADE
       );";

       $res = $con->exec($sql_relacio);
       if($res===false){
         echo '<p class="bg-danger">No s\'ha pogut crear la taula relacio</p>';
         echo "<p>".$con->errorinfo()[2]."</p>";
       }else{
         echo '<p class="text-primary">Taula de relacio creada!!!</p>';
       }

       //Insert datos tabla de contactes

       $sql_insert = "INSERT INTO contactes(id,nom,mail)
       VALUES('','Albert','albertllosa84@gmail.com'),
             ('','Jordi','jllosa@totarquitectura.com'),
             ('','Ramon','ramonllosa@gmail.com');";
       $res = $con->exec($sql_insert);
       if($res===false){
           echo '<p class="bg-danger">Error a l\'afegir dades.</p>';
           echo "<p>".$con->errorInfo()[2]."</p>";
       }else{
           echo '<p class="text-primary">Contacte afegit correctament</p>';
       }

     ?>
  </body>
</html>
