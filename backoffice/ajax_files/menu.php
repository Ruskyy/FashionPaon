<?php
$dhb = $_POST['tipo'];
    switch ($dhb) {
      case 1:
        include '../menu_files/add_cliente.php';
        break;
      case 2:
        include '../menu_files/list_cliente.php';
        break;
      case 3:
        include '../menu_files/add_admin.php';
        break;
      case 4:
        include '../menu_files/list_admin.php';
        break;
      case 5:
        include '../menu_files/.php';
        break;
      case 6:
        include '../menu_files/.php';
        break;
      case 7:
        include '../menu_files/.php';
        break;
      case 8:
        include '../menu_files/.php';
        break;
      case 9:
        include '../menu_files/.php';
        break;
      case 10:
        include '../menu_files/.php';
        break;
      case 11:
        include '../menu_files/.php';
        break;
      case 12:
        include '../menu_files/.php';
        break;
      case 13:
        include '../menu_files/.php';
        break;
      default:
        include '../menu_files/backoff_home.php';
        break;
    }
   ?>
