<?php
require_once '../../../php/functions.php';
session_start();
include '../../../php/conn.php';

  $id = $_POST['id'];
  $tipo = $_POST['tipo'];
  $preco = $_POST['preco'];
  $quantidade = $_POST['quantidade'];
  $FL_quantidade = $quantidade;
  $FL_preco = $preco;

  if($tipo == 1 || $tipo == 0){
    if($quantidade >= 0){
      if($tipo == 0){
        if($quantidade <= 1){
          $FL_quantidade = 1;
          }else{
            $FL_quantidade -= 1;
          }
        }
      elseif($tipo == 1){
        if($quantidade >= 30){
            $FL_quantidade = 30;
          }else{
            $FL_quantidade += 1;
          }
        }
      }
    else{
        $FL_quantidade = 1;
      }
      $FL_preco = (int)$FL_preco * (int)$FL_quantidade;
      echo $FL_quantidade.':sucesso/'.$FL_preco;
  }
  else if($tipo == 2){

    echo 'sucesso';
  }else if($tipo == 3){

    echo 'sucesso';
  }
  include '../../../php/deconn.php';
  ?>
