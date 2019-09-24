<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $id = $_POST['id'];
  $tipo = $_POST['tipo'];

  /* NOTE:
    0-- encomenda no estado 'processar'
    1-- encomenda no estado 'processado'
    2-- encomenda no estado 'cancelado'
  */
  if($tipo == 0){
    /*$estado = 0;
    $minutes_to_add = 5;

    $time = new DateTime();
    $time->setTimezone(new DateTimeZone('Europe/Lisbon'));
    $timesToday = $time->format("Y/m/d G:i:s");
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $timesEnd = $time->format("Y/m/d G:i:s");
    echo $timesToday; //+00 |
    echo $timesEnd;   //+10 |
    mysqli_query($conn,"INSERT INTO ad_encomendas(
                ad_encomendas_descricao,
                 ad_encomendas_idstock,
                  ad_encomendas_quantidade,
                   ad_encomendas_data,
                    ad_encomendas_estado,
                      ad_encomendas_datafim)
                VALUES ('','$id','','$schedule_date','$estado')");*/
  }else if ($tipo == 1) {
      $estado = 1;
      mysqli_query($conn, "UPDATE ad_encomendas
       SET ad_encomendas_estado = $estado
        WHERE ad_encomendas_id = $id");

    $dado = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT ad_encomendas_quantidades, ad_encomendas_idstock
      FROM ad_encomendas WHERE ad_encomendas_id = $id"));

    mysqli_query($conn, "UPDATE stock
      SET stock_quantidade = stock_quantidade + '$dado[ad_encomendas_quantidades]'
        WHERE stock_id = '$dado[ad_encomendas_idstock]'");
  }else if ($tipo == 2) {
    $estado = 2;
    mysqli_query($conn, "UPDATE ad_encomendas
       SET ad_encomendas_estado = $estado
        WHERE ad_encomendas_id = $id");
  }else if($tipo == 3){
    mysqli_query($conn,"DELETE FROM ad_encomendas
       WHERE ad_encomendas_id  = '$id' AND (ad_encomendas_estado = 1 OR ad_encomendas_estado = 2)");
  }else if ($tipo == 4) {
    $estado_notify = 1;
    $tabela_notify = 2;
    $tipo_notify = 3;
    $content_notify = "A encomenda de [&quantidade&] [&nome&] com o tamanho [&tamanho&] foi cancelada.";
    mysqli_query($conn, "UPDATE ad_encomendas
      SET ad_encomendas_estado = 3
        WHERE ad_encomendas_id = $id");
    mysqli_query($conn, "UPDATE ad_notification
      SET ad_notification_estado = 0
        WHERE ad_notification_idtabela = $id");
    mysqli_query($conn,"INSERT INTO
      ad_notification(ad_notification_tipo, ad_notification_content, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela)
      VALUES ('$tipo_notify', '$content_notify', '$estado_notify', '$tabela_notify', '$id')");
  }
  include '../../../php/deconn.php';
 ?>
