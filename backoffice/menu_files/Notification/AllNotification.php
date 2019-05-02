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
    $notf_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ad_notification WHERE ad_notification_estado = '1'"));
    echo $notf_rows;
  }
  if($tipo == 1){
    $dado = mysqli_query($conn,
    "SELECT ad_notification_id, ad_notification_content, ad_notification_tipo, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela
    FROM ad_notification WHERE ad_notification_estado = '1'");
        while ($rows = mysqli_fetch_assoc($dado)){
          $dados = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ad_tabelas_nome, ad_tabelas_num FROM ad_tabelas WHERE ad_tabelas_num = '$rows[ad_notification_tabela]'"));
          if($dados['ad_tabelas_nome'] == 'ad_encomendas'){
            $campos ="SELECT ad_encomendas_id,
                              ad_encomendas_preco,
                                ad_encomendas_quantidades,
                              	 ad_encomendas_data,
                                	ad_encomendas_estado,
                                	 ad_encomendas_id_tabela,
                                    ad_encomendas_tabela,
                                  	 ad_encomendas_datafim
                        FROM ad_encomendas WHERE ad_encomendas_id = '$rows[ad_notification_idtabela]'";
            $dadoss = mysqli_fetch_assoc(mysqli_query($conn, $campos));
            $finalDate = strtotime($dadoss['ad_encomendas_datafim']);
            $finalDate = date('Y/m/d G:i:s',$finalDate);
            $time = new DateTime();
            $time->setTimezone(new DateTimeZone('Europe/Lisbon'));
            $timesToday = $time->format("Y/m/d G:i:s");
          }
          echo $tipo;
          echo $dados['ad_tabelas_nome'];
          echo $dadoss['ad_encomendas_datafim'];
          echo "|".$finalDate;
          echo "|".$timesToday."|";
          if($timesToday >= $finalDate){
            echo 'TT';
            mysqli_query($conn, "UPDATE ad_notification SET ad_notification_estado = 0 WHERE ad_notification_id = '$rows[ad_notification_id]'");
            mysqli_query($conn, "UPDATE ad_encomendas SET ad_encomendas_estado = 0 WHERE ad_encomendas_id = '$dadoss[ad_encomendas_id]'");
            $test = ""+$rows['ad_notification_content'];
            demo.showNotification('top','right', 'why')
            echo 'ok';
          }
        }
  }
  include '../../../php/deconn.php';
?>
