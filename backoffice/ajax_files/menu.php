<?php
$dhb = $_POST['tipo'];
    switch ($dhb) {
      case 1:
        include '../menu_files/Clientes/add_cliente.php';
        break;
      case 2:
        include '../menu_files/Clientes/list_cliente.php';
        break;
      case 3:
        include '../menu_files/Admins/add_admin.php';
        break;
      case 4:
        include '../menu_files/Admins/list_admin.php';
        break;
      case 5:
        include '../menu_files/Produtos/add_produto.php';
        break;
      case 6:
        include '../menu_files/Produtos/list_produto.php';
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
