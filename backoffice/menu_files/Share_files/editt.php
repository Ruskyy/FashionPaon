<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

  $id = $_POST['id'];
  $pass = $_POST['pass'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $data = $_POST['data'];
  $morada = $_POST['morada'];
  $codpos = $_POST['codpos'];
  $paises = $_POST['paises'];
  $nif = $_POST['nif'];
  $tele = $_POST['tele'];
  $email = $_POST['email'];

  $rows=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cliente_tipo FROM cliente WHERE cliente_id = '$id'"));
  $query = "CALL usp_edit_cliente('$id','$pass','$fname','$lname','$data','$morada','$codpos','$paises','$nif','$tele','$email')";
  mysqli_query($conn,$query);

  include '../../../php/deconn.php';
  echo $rows['cliente_tipo'];
  ?>
