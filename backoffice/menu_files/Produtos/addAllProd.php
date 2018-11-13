<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

  $id = $_POST['id'];
  $tipo = $_POST['tipo'];
  //$id = $_POST['idd'];
  //$tipo = $_POST['tipoo'];


/*
  if($tipo == 2){
    $nome_produto = $_POST['nome_produto'];
    $categoria_produto = $_POST['categoria_produto'];
    $categoria_publico = $_POST['categoria_publico'];
    $descricao_produto = $_POST['descricao_produto'];
    //produto_id, produto_idcategoria,	produto_nome,	produto_idmarca,	produto_desc,	id_publico
    mysqli_query($conn, "UPDATE produto SET produto_nome = '$nome_produto', produto_idcategoria = '$categoria_produto', produto_desc = '$descricao_produto', id_publico = '$categoria_publico'  WHERE produto_id = '$id'");
    echo 'sucesso';
  }*/
  include '../../../php/deconn.php';
  ?>
