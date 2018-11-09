<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';


  $id = $POST['id'];
  $pass = $POST['pass'];
  $fname = $POST['fname'];
  $lname = $POST['lname'];
  $data = $POST['data'];
  $morada = $POST['morada'];
  $codpos = $POST['codpos'];
  $paises = $POST['paises'];
  $nif = $POST['nif'];
  $tele = $POST['tele'];
  $email = $POST['email'];

  $rows=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cliente_tipo FROM cliente WHERE cliente_id = '$id'"));
  $query = "CALL usp_edit_cliente('$id','$pass','$fname','$lname','$data','$morada','$codpos','$paises','$nif','$tele','$email')";
  mysqli_query($conn,$query);

  include '../../../php/deconn.php';
  echo $rows['cliente_tipo'];
  ?>
