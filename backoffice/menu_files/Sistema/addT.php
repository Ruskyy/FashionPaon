<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

  $nome = $_POST['nome'];
  $categoria = $_POST['categoria'];

  addTamanho($nome,$categoria);
  include '../../../php/deconn.php';
  ?>
