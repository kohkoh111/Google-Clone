<?php
ob_start();

try{
  $con = new PDO("mysql:dbname=Google;host=localhost","root","root");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}catch(PDOException $e){
  echo "failed to Connect".$e->getMessage();
}

 ?>
