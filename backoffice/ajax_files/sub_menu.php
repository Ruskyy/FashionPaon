<?php
$dhb = $_POST['tipo'];
    switch ($dhb) {

      //Cliente/Admin
      case 1:
        include '../menu_files/Share_files/carrinho.php';
        break;
      case 2:
        include '../menu_files/Share_files/listar.php';
        break;
      case 3:
        include '../menu_files/Share_files/editar.php';
        break;
      case 4:
        include '../menu_files/Share_files/carrinho2.php';
        break;
      //Produto
      case 5:
        include '../menu_files/Produtos/desconto.php';
        break;
      case 6:
        include '../menu_files/Produtos/listar.php';
        break;
      case 7:
        include '../menu_files/Produtos/info_stock.php';
        break;
      case 8:
        include '../menu_files/Produtos/info_img.php';
        break;
      case 9:
        include '../menu_files/Produtos/add_stock.php';
        break;
      case 10:
        include '../menu_files/Produtos/add_img.php';
        break;
      case 11:
        include '../menu_files/Produtos/editar.php';
        break;
      case 12:
        include '../menu_files/Sistema/tamanhos.php';
        break;
    }
   ?>
