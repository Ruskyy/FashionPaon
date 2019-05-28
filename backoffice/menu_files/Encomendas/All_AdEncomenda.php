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
      FROM ad_encomendas WHERE ad_encomendas_id = $id");

    mysqli_query($conn, "UPDATE stock
       SET stock_quantidade = stock_quantidade + $dado['ad_encomendas_quantidades']
        WHERE stock_id = $dado['ad_encomendas_idstock']");
  }else if ($tipo == 2) {
    $estado = 2;
    mysqli_query($conn, "UPDATE ad_encomendas
       SET ad_encomendas_estado = $estado
        WHERE ad_encomendas_id = $id");
  }else if($tipo == 3){
    mysqli_query($conn,"DELETE FROM ad_encomendas
       WHERE ad_encomendas_id  = '$id' AND (ad_encomendas_estado = 1 OR ad_encomendas_estado = 2)");
  }else if ($tipo == 4) {
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

          if($diff >= 0){
            $messr = "+";
          }else {
            $messur = "-";
          }
          ?>
            <tr>
              <td><?php echo $prod["produto_nome"];?></td>
              <td><?php echo $stock["stock_prodtamanho"];?></td>
              <td><?php echo $rows["ad_encomendas_quantidades"];?></td>
              <td><?php echo $rows["ad_encomendas_preco"];?></td>
              <td><?php echo $rows["ad_encomendas_data"];?></td>
              <td><?php echo $rows["ad_encomendas_datafim"];?></td>
              <td><?php echo $messr;?></td>
              <td><?php echo $diffy;?></td>
              <td><?php echo $diffmth;?></td>
              <td><?php echo $diffd;?></td>
              <td><?php echo $diffh;?></td>
              <td><?php echo $diffm;?></td>
              <td><?php echo $diffs;?></td>
              <td>
                <button type="button" rel="tooltip" title="Desconto" class="btn btn-success btn-simple btn-xs" onclick="">
                    <i class="fa fa-ticket"></i>
                </button>
                <button type="button" rel="tooltip" title="Informação" class="btn btn-warning btn-simple btn-xs" onclick="">
                    <i class="fa fa-list-alt"></i>
                </button>
                <button type="button" rel="tooltip" title="Informação" class="btn btn-warning btn-simple btn-xs" onclick="">
                    <i class="fa fa-list-alt"></i>
                </button>
              </td>
            </tr><?php
          }
        }

  }
  include '../../../php/deconn.php';
 ?>
