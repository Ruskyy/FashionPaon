<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $id = $_POST['id'];
  $tipo = $_POST['tipo'];
  $tipox = $_POST['tipox'];

  /* NOTE:
    0-- encomenda no estado 'processar'
    1-- encomenda no estado 'processado'
    2-- encomenda no estado 'cancelado'

    -4: uma notificação de occorido imediatamente (só para produto geral)
  */
  $tabela = 0;
  $idtabela = 0;
  $tabela2 = 0;
  $idtabela2 = 0;

  $estado_notify = 1;
  $tipo_notify = 4;
  $content = "";
  $content = $tipox == 0 ? "adicionado" : $content;
  $content = $tipox == 1 ? "modificado" : $content;
  $content = $tipox == 2 ? "eliminado"  : $content;
  if($tipo == 0){// produto

    $tabela = 3;
    $idtabela = $id;
    $tabela_notify = 3;
    $content_notify = "Foi ".$content." um produto [&nome&]";
  }else if ($tipo == 1) {// marca

    $tabela = 3;
    $idtabela = $id;
    $tabela2 = 4;
    $idtabela2 = $id2;
    $tabela_notify = 4;
    $content_notify = "Foi ".$content." a marca [&marca&] ao produto [&nome&]";
  }else if ($tipo == 2){// stock

    $tabela = 3;
    $idtabela = $id;
    $tabela2 = 5;
    $idtabela2 = $id2;
    $tabela_notify = 5;
    $content_notify = "Foi ".$content." o stock [&stock&] ao produto [&nome&]";
  }else if($tipo == 3){// imagem

    $tabela = 3;
    $idtabela = $id;
    $tabela2 = 6;
    $idtabela2 = $id2;
    $tabela_notify = 6;
    $content_notify = "Foi ".$content." uma imagem da categoria [&categoria&] ao produto [&nome&]";
  }
  if( $tipo >= 0 || $tipo <= 3 ){

    mysqli_query($conn,"INSERT INTO
      ad_notify(ad_notify_tabela, ad_notify_idtabela, ad_notify_tabela_2, ad_notify_idtabela_2, ad_notify_tipo)
      VALUES ('$tabela', '$idtabela', '$tabela2', '$idtabela2', '$tipox')");

    $last_id = mysqli_insert_id($conn);
    $tabela_notify = 7;
    mysqli_query($conn,"INSERT INTO
      ad_notification(ad_notification_tipo, ad_notification_content, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela)
      VALUES ('$tipo_notify', '$content_notify', '$estado_notify', '$tabela_notify', '$last_id')");
  }
  include '../../../php/deconn.php';
 ?>
