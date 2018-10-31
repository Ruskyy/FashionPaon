<?php
$dhb = $_POST['tipo'];
    switch ($dhb) {
      case 1:
        include '../menu_files/Clientes/carrinho.php';
        break;
      case 2:
        include '../menu_files/Clientes/listar.php';
        break;
      case 3:
        include '../menu_files/Clientes/editar.php';
        break;
      case 4:
        include '../menu_files/.php';
        break;
    }
   ?>
