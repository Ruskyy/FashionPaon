<?php
$dhb = $_POST['tipo'];
    switch ($dhb) {
      case 1:
        include 'backoff_home.php';
        break;
      case 2:
        include 'add_cliente.php';
        break;
      default:
        include 'list_cliente.php';
        break;
    }
   ?>
