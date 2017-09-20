<?php
$bd_user = "root";
$bd_password = "";
$bd_url = "localhost";
$bd_name = "agenda";

//Conectar con la base de datos
  try{
    $con = new PDO("mysql:host=$bd_url; dbname=$bd_name", $bd_user, $bd_password);
  }catch(PDOException $e){
    $con = null;
  }

//Funcio buscador
 function getagenda($buscador){
   global $con;
   if(!$con) return [];

   if ($buscador) {
     $sql = "SELECT * FROM contactes WHERE nom LIKE '%".$buscador."%' ORDER BY nom;";
   }else{
     $sql = "SELECT * FROM contactes ORDER BY nom;";
   }

   $res = $con->query($sql);
   if($res) return $res->fetchAll();
   else return [];
 }

//Funcio crear un nou contacte
function afegircontacte($nom, $mail){
  global $con;
  if(!$con) return false;

  $sql = "INSERT INTO contactes (nom, mail) values ('".$nom."', '".$mail."')";
  $res = $con->exec($sql);

  if($res===true) return true;
  else return false;
}

//Funcio elimina contacte
function eliminacontacte($id){
  global $con;
  if(!$con) return false;

  $sql = "SELECT * FROM contactes where id=$id";
  $res = $con->query($sql);

  $sql_borrar = "DELETE FROM contactes where id=$id";
  $res_borrar = $con->exec($sql_borrar);

  if($res_borrar===false) return false;
  else return $res->fetch();

}




?>
