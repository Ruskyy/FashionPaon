<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];

  $rows=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cliente_tipo FROM cliente WHERE cliente_id = '$id'"));
  mysqli_query($conn,"DELETE FROM cliente WHERE cliente_id = '$id'");
  include '../../../php/deconn.php';

  echo $rows['cliente_tipo'];
  ?>
