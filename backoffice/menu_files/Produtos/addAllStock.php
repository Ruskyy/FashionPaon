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
  $tabela = "stock";
  $preco_total = $_POST['precoTotal'];
  if($tipo == 1 || $tipo == 0){
    if((float)$quantidade >= 0){
      if($tipo == 0){
        if((float)$quantidade <= 1){
            $FL_quantidade = 1;
          }else{
            $FL_quantidade -= 1;
          }
        }
      elseif($tipo == 1){
        if((float)$quantidade >= 30){
            $FL_quantidade = 30;
          }else{
            $FL_quantidade += 1;
          }
        }
      }
    else{
        $FL_quantidade = 1;
      }
      if((float)$FL_preco >= 0){
        $FL_preco = (float)$FL_preco * (int)$FL_quantidade;
        echo $FL_quantidade.':sucesso/'.$FL_preco;
      }else{
        echo $FL_quantidade.':erro/'.$FL_preco;
      }
  }
  elseif($tipo == 2){
    $estado = 1;
    $minutes_to_add = 5;
    $time = new DateTime();
    $time->setTimezone(new DateTimeZone('Europe/Lisbon'));
    $timesToday = $time->format("Y/m/d G:i:s");
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $timesEnd = $time->format("Y/m/d G:i:s");
    $dado = mysqli_query($conn,"SELECT ad_tabelas_nome, ad_tabelas_num FROM ad_tabelas WHERE ad_tabelas_nome = '$tabela'");
    $rows = mysqli_fetch_assoc($dado);
    $tabeladb = $rows['ad_tabelas_num'];
    mysqli_query($conn,"INSERT INTO
      ad_encomendas(ad_encomendas_preco, ad_encomendas_quantidades, ad_encomendas_data, ad_encomendas_datafim, ad_encomendas_estado, ad_encomendas_tabela, ad_encomendas_id_tabela)
      VALUES ('$preco_total', '$quantidade', '$timesToday', '$timesEnd', '$estado', '$tabeladb', '$id')");
    $tipo_notify
    mysqli_query($conn,"INSERT INTO
      ad_notification(ad_notification_tipo, ad_notification_content, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela)
      VALUES ('', '', '', '', '')");
    echo 'sucesso';
  }elseif($tipo == 3){

    echo 'sucesso';
  }
  include '../../../php/deconn.php';
?>
