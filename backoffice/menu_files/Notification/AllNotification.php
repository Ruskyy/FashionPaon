<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];

  function getTabela($num){
    $tb = mysqli_fetch_assoc(mysqli_query($conn,
      "SELECT ad_tabelas_nome, ad_tabelas_num
      FROM ad_tabelas
      WHERE ad_tabelas_num = '$num'"));
    return $tb['ad_tabelas_nome'];
  }
  /*
  está página precisa:
    -id
    -id2
    -tipo
    -tipox


    -0:
    -1: uma notificação alertar passado x de tempo (só para encomendas)
    -2: uma notificação de sucesso occorido imediatamente (só para encomendas)
    -3: uma notificação de erro occorido imediatamente (só para encomendas)
    -4: uma notificação de occorido imediatamente (só para produto geral)
  */
  if($tipo == 0){
    $notf_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ad_notification
      WHERE ad_notification_estado = '1'
        OR ad_notification_estado = '2'
        OR ad_notification_estado = '3'
        OR ad_notification_estado = '4'"));
    echo $notf_rows;
  }
  if($tipo == 1){
    $dado = mysqli_query($conn,
    "SELECT ad_notification_id, ad_notification_content, ad_notification_tipo, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela
    FROM ad_notification
      WHERE ad_notification_estado = '1'
        OR ad_notification_estado = '2'
        OR ad_notification_estado = '3'
        OR ad_notification_estado = '4'");
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
        $dados2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ad_tabelas_nome, ad_tabelas_num FROM ad_tabelas WHERE ad_tabelas_num = '$dadoss[ad_encomendas_tabela]'"));
        if( $dados2['ad_tabelas_nome'] == "stock" ){
          $finalDate = strtotime($dadoss['ad_encomendas_datafim']);
          $finalDate = date('Y/m/d G:i:s',$finalDate);
          $time = new DateTime();
          $time->setTimezone(new DateTimeZone('Europe/Lisbon'));
          $timesToday = $time->format("Y/m/d G:i:s");
          $dadossss = mysqli_fetch_assoc(
            mysqli_query($conn,
            "SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
            FROM stock WHERE stock_id = '$dadoss[ad_encomendas_id_tabela]'"));
          if($rows['ad_notification_tipo'] == 1){
            if($timesToday >= $finalDate){
              if($dadossss){
                  $dadosss = mysqli_fetch_assoc(
                    mysqli_query($conn,
                      "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                        FROM produto WHERE produto_id = '$dadossss[stock_idproduto]'"));
                  mysqli_query($conn, "UPDATE ad_notification SET ad_notification_estado = 0 WHERE ad_notification_id = '$rows[ad_notification_id]'");
                  mysqli_query($conn, "UPDATE ad_encomendas SET ad_encomendas_estado = 0 WHERE ad_encomendas_id = '$dadoss[ad_encomendas_id]'");
                  $test = "".$rows['ad_notification_content'];
                  $test = str_replace("[&quantidade&]",$dadoss['ad_encomendas_quantidades'],$test);
                  $test = str_replace("[&nome&]",$dadosss['produto_nome'],$test);
                  $test = str_replace("[&tamanho&]",$dadossss['stock_prodtamanho'],$test);
                  $total_quant = $dadossss['stock_quantidade'] + $dadoss['ad_encomendas_quantidades'];
                  mysqli_query($conn, "UPDATE stock SET stock_quantidade = $total_quant WHERE stock_id = '$dadossss[stock_id]'");
                  ?>
                  <script> demo.showNotification('top','right', '<?php echo "".$test; ?>') </script>
                  <?php
              }
            }
          }else if ($rows['ad_notification_tipo'] == 2) {

          }else if ($rows['ad_notification_tipo'] == 3) {
            $dadossss = mysqli_fetch_assoc(
              mysqli_query($conn,
                "SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
                  FROM stock WHERE stock_id = '$dadoss[ad_encomendas_id_tabela]'"));
            if($dadossss){
                $dadosss = mysqli_fetch_assoc(mysqli_query($conn, "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                  FROM produto WHERE produto_id = '$dadossss[stock_idproduto]'"));
                mysqli_query($conn, "UPDATE ad_notification SET ad_notification_estado = 0 WHERE ad_notification_id = '$rows[ad_notification_id]'");
                $test = "".$rows['ad_notification_content'];
                $test = str_replace("[&quantidade&]",$dadoss['ad_encomendas_quantidades'],$test);
                $test = str_replace("[&nome&]",$dadosss['produto_nome'],$test);
                $test = str_replace("[&tamanho&]",$dadossss['stock_prodtamanho'],$test);
                ?>
                <script> demo.showNotification('top','right', '<?php echo "".$test; ?>') </script>
                <?php
            }
          }else if ($rows['ad_notification_tipo'] == 4) {
            $sl_notification = mysqli_fetch_assoc(
              mysqli_query($conn,
                "SELECT ad_notify_id, ad_notify_tabela, ad_notify_idtabela, ad_notify_tabela_2, ad_notify_idtabela_2, ad_notify_tipo
                  FROM ad_notify  where ad_notify_id = '$dado[ad_notification_id]'"));
            $nome_tabela = getTabela($sl_notification['ad_notify_tabela']);
            if($nome_tabela == "produto"){
              $dadossss = mysqli_fetch_assoc(
                mysqli_query($conn,
                  "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                    FROM produto where produto_id = '$sl_notification[ad_notify_idtabela]'"));
              $test = "".$rows['ad_notification_content'];
              $test = str_replace("[&nome&]",$dadossss['produto_nome'] ,$test);
              $nome_tabela2 = getTabela($sl_notification['ad_notify_tabela_2']);
              if($nome_tabela2 == "marca"){
                $dadossss2 = mysqli_fetch_assoc(
                  mysqli_query($conn,
                    "SELECT id_marca, prod_marca_id, prod_id
                      FROM marca Inner Join marcas ON prod_marca_id = id_marca WHERE prod_id = '$sl_notification[ad_notify_idtabela_2]'"));
                $test = str_replace("[&marca&]",$dadossss2['nome_marca'] ,$test);
              }else if($nome_tabela2 == 'stock'){

                $dadossss2 = mysqli_fetch_assoc(
                  mysqli_query($conn,
                    "SELECT *
                      FROM stock Inner join tamanho ON stock_prodtamanho = id_tamanho WHERE  stock_id = '$sl_notification[ad_notify_idtabela_2]'"));
                $test = str_replace("[&stock&]",$dadossss2['nome_tamanho'] ,$test);
              }else if($nome_tabela2 == 'imagem'){

                $dadossss2 = mysqli_fetch_assoc(
                  mysqli_query($conn,
                    "SELECT *
                      FROM imagem Inner join imgcategoria ON imagem.id_imgcategoria = imgcategoria.id_imgcategoria WHERE id_imagem = '$sl_notification[ad_notify_idtabela_2]'"));
                $test = str_replace("[&categoria&]",$dadossss2['imgcategoria.nome_imgcategoria'] ,$test);
              }
              ?>
                <script> demo.showNotification('top','right', '<?php echo "".$test; ?>') </script>
              <?php
            }
          }
        }
      }
    }
  }
  include '../../../php/deconn.php';
?>
