<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];

  if($tipo == 0){
    $notf_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM notification");
    echo $notf_rows;
  }
  include '../../../php/deconn.php';
?>
