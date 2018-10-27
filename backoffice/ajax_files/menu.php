<?php
$dhb = $_POST['tipo'];
    switch ($dhb) {
      case 1:
        include '../menu_files/add_cliente.php';
        break;
      case 2:
        include '../menu_files/list_cliente.php';
        break;
      default:
        include '../menu_files/backoff_home.php';
        break;
    }
   ?>
