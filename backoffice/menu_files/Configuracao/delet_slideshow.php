<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];

    mysqli_query($conn,"DELETE FROM slider WHERE id_slide = '$id'");

  include '../../../php/deconn.php';
?>
