<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];

  if($tipo == 0){
    $dado = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM notification ");
  }
  include '../../../php/deconn.php';
?>
