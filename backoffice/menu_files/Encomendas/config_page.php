<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $dado =mysqli_query($conn,"SELECT ad_encomendas_id, ad_encomendas_preco, ad_encomendas_quantidades, ad_encomendas_estado,
                                    ad_encomendas_id_tabela, ad_encomendas_tabela, ad_encomendas_data, ad_encomendas_datafim FROM ad_encomendas");
while ($rows = mysqli_fetch_assoc($dado)){
  if($rows['ad_encomendas_tabela'] == 1){
      $queryidcategoria = "SELECT
                            stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
                              FROM stock WHERE stock_id = ".$rows['ad_encomendas_id_tabela'];
      $stock = mysqli_fetch_assoc(mysqli_query($conn, $queryidcategoria));
      $queryidpublico = "SELECT
                          produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                            FROM produto WHERE produto_id = ".$stock['stock_idproduto'];
      $prod = mysqli_fetch_assoc(mysqli_query($conn, $queryidpublico));

      $nowDate = new DateTime();
      $nowDate->setTimezone(new DateTimeZone('Europe/Lisbon'));
      $nowDate = $nowDate->format("Y/m/d G:i:s");

      $finalDate = strtotime($rows['ad_encomendas_datafim']);
      $finalDate = date("Y/m/d G:i:s",$finalDate);

      if($nowDate >= $finalDate){
        $messr = "+";
      }else {
        $messr = "-";
      }

      $finalDate = strtotime($finalDate);
      $nowDate = strtotime($nowDate);
      $diff = abs($nowDate - $finalDate);
      $diffy = floor($diff / (365*60*60*24));
      $diffmth = floor(($diff - $diffy * 365*60*60*24)
                                     / (30*60*60*24));
      $diffd = floor(($diff - $diffy * 365*60*60*24 -
                   $diffmth*30*60*60*24)/ (60*60*24));
      $diffh = floor(($diff - $diffy * 365*60*60*24
             - $diffmth*30*60*60*24 - $diffd*60*60*24)
                                         / (60*60));
      $diffm = floor(($diff - $diffy * 365*60*60*24
               - $diffmth*30*60*60*24 - $diffd*60*60*24
                                - $diffh*60*60)/ 60);
      $diffs = floor(($diff - $diffy * 365*60*60*24
               - $diffmth*30*60*60*24 - $diffd*60*60*24
                      - $diffh*60*60 - $diffm*60));
            /**
            danger  - 3 - perdido
            warning - 2 - cancelado
            info    - 1 - processar
            success - 0 - entregado
            */
            $class = "";
             if($rows['ad_encomendas_estado'] == 0){
                $class = "success";
                $title = 'Entregado';
            }else if($rows['ad_encomendas_estado'] == 1){
              $class = "info";
              $title = 'Processar';
            }else if($rows['ad_encomendas_estado'] == 3){
              $class = "warning";
              $title = 'Cancelado';
            }else{
              $class = "danger";
              $title = 'Perdido';
            }
            $button ="";
            $button2 ="";
            $button =
            '<button type="button" rel="tooltip" title="'.$title.'" class="btn btn-'.$class.' btn-simple btn-xs" onclick="">
                  <i class="fa fa-cube"></i>
              </button>';
              if($rows['ad_encomendas_estado'] == 1){
                $button2 =
                '<button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="myFunction_EncDelete('.$rows["ad_encomendas_id"].')">
                        <i class="fa fa-times"></i>
                  </button>';
              }
              $horas_atuais = $messr." ".$diffy."Y ".$diffmth."M ".$diffd."d ".$diffh."h ".$diffm."m ".$diffs."s";
              $marks =
                  array(
                      "id"            => $rows['ad_encomendas_id'],
                      "horas"         => $horas_atuais,
                      "first_button"  => $button,
                      "second_button" => $button2,
                  );
              $script[] = $marks;
      }
    }

  echo json_encode($script);
?>
