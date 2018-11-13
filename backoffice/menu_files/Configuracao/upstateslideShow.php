<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];
  $tipo = $_POST['tipo'];

if($tipo == 0){
    mysqli_query($conn,"UPDATE slider SET slide_state = 1  WHERE id_slide = '$id'");
}if($tipo == 1){
  mysqli_query($conn,"UPDATE slider SET slide_state = 0  WHERE id_slide = '$id'");
}
  include '../../../php/deconn.php';
?>
