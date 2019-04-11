<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];
  /*
    -0: uma notificação do ocorrido
    -1: uma notificação alertar passado x de tempo
    -2:
    -3:
  */
  if($tipo == 0){
    $notf_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ad_notification"));
    echo $notf_rows;
  }
  if($tipo == 1){
    $dado = mysqli_query($conn,
    "SELECT ad_notification_id, ad_notification_tipo, ad_notification_content, ad_notification_estado
      FROM ad_notification");
        while ($rows = mysqli_fetch_assoc($dado)){

        }
  }
  include '../../../php/deconn.php';
?>
