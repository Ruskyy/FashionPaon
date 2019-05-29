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
          <td><?php echo date("d/m/Y G:i:s",strtotime($rows["ad_encomendas_data"]));?></td>
          <td><?php echo date("d/m/Y G:i:s",strtotime($rows["ad_encomendas_datafim"]));?></td>
          <td><?php echo $messr." ".$diffy."Y ".$diffmth."M ".$diffd."d ".$diffh."h ".$diffm."m ".$diffs."s" ?></td>
          <td>

            <?php
            /**
            info - 1
            danger - 3
            warning - 2'
            success - 0
            */
            $class = "";
             if($rows['ad_encomendas_estado'] == 0){
                $class = "success";
            }else if($rows['ad_encomendas_estado'] == 1){
              $class = "info";
            }else if($rows['ad_encomendas_estado'] == 3){
              $class = "danger";
            }else{
              $class = "warning";
            } ?>
            <button type="button" rel="tooltip" title="Estado" class="btn btn-<?php echo $class;?> btn-simple btn-xs" onclick="">
                <i class="fa fa-cube"></i>
            </button>
            <?php
              if($rows['ad_encomendas_estado'] == 1){?>
                <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="myFunction_EncDelete(<?php echo $rows['ad_encomendas_id'];?>)">
                      <i class="fa fa-times"></i>
                </button><?php
              }
             ?>
          </td>
        </tr>
        <?php
      }
    }
?>
