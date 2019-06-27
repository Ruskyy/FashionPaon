<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';


?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="header">
                    <h4 class="title">Striped Table with Hover</h4>
                    <p id="btns" class="category">Here is a subtitle for this table</p>
                    <p>
                      <button type="button" rel="tooltip" title="Entregado" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-cube"></i> Entregado
                      </button>

                      <button type="button" rel="tooltip" title="Processar" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-cube"></i> Processar
                      </button>

                      <button type="button" rel="tooltip" title="Cancelado" class="btn btn-warning btn-simple btn-xs">
                        <i class="fa fa-cube"></i> Cancelado
                      </button>

                      <button type="button" rel="tooltip" title="Perdido" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-cube"></i> Perdido
                      </button>
                  </p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead>
                          <th>Produto</th>
                          <th>Tamanho</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Começou</th>
                          <th>Termina</th>
                          <th>Tempo Restante</th>
                          <th>Estado</th>
                        </thead>
                        <tbody>
                          <?php
                            $dado =mysqli_query($conn,"SELECT ad_encomendas_id, ad_encomendas_preco, ad_encomendas_quantidades, ad_encomendas_estado,
                                                              ad_encomendas_id_tabela, ad_encomendas_tabela, ad_encomendas_data, ad_encomendas_datafim FROM ad_encomendas");
                          while ($rows = mysqli_fetch_assoc($dado)){
                            if($rows['ad_encomendas_tabela'] == 1){
                                $queryidcategoria = "SELECT
                                                      stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
                                                        FROM stock WHERE stock_id = ".$rows['ad_encomendas_id_tabela'];
                                $stock = mysqli_fetch_assoc(mysqli_query($conn, $queryidcategoria));
                                $queryidpublico = "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                                                      FROM produto WHERE produto_id = ".$stock['stock_idproduto'];
                                $nome_stock = "SELECT nome_tamanho
                                                      FROM tamanho WHERE id_tamanho = ".$stock['stock_prodtamanho'];
                                $prod_stock = mysqli_fetch_assoc(mysqli_query($conn, $nome_stock));
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
                                ?>
                                  <tr>
                                    <td><?php echo $prod["produto_nome"];?></td>
                                    <td><?php echo $prod_stock["nome_tamanho"];?></td>
                                    <td><?php echo $rows["ad_encomendas_quantidades"];?></td>
                                    <td><?php echo $rows["ad_encomendas_preco"];?></td>
                                    <td><?php echo date("d/m/Y G:i:s",strtotime($rows["ad_encomendas_data"]));?></td>
                                    <td><?php echo date("d/m/Y G:i:s",strtotime($rows["ad_encomendas_datafim"]));?></td>
                                    <td id="<?php echo "Enc_hora_".$rows["ad_encomendas_id"]; ?>"><?php echo $messr." ".$diffy."Y ".$diffmth."M ".$diffd."d ".$diffh."h ".$diffm."m ".$diffs."s"; ?></td>
                                    <td id="<?php echo "Enc_button_".$rows["ad_encomendas_id"]; ?>"></td>
                                    <td id="<?php echo "Enc_button2_".$rows["ad_encomendas_id"]; ?>"></td>
                                  </tr>
                                  <?php
                                }
                              }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="col-md-6" >
            <div id="sub_menu_aqui">

            </div>
          </div>
        </div>
      </div>
      <script>
      intervalID = null;
      var obj2 = {};
      var obj3 = [];
      function ReceveData(){
        $.ajax({
            url:"menu_files/Encomendas/config_page.php",
            method:"POST",
            success:function(data){
              obj = JSON.parse(data);
              for (var i = 0; i < obj.length; i++) {
                $( "#Enc_hora_"+obj[i]['id'] ).html( obj[i]['horas'] );
                if(obj[i]['first_button'] !=  obj2[obj[i]['id']]){
                   $("#Enc_button_"+obj[i]['id'] ).html(obj[i]['first_button']);
                   obj2[obj[i]['id']] = obj[i]['first_button'];
                }
                if(obj[i]['second_button'] !=  obj3[obj[i]['id']]){
                  $( "#Enc_button2_"+obj[i]['id'] ).html( obj[i]['second_button'] );
                  obj3[obj[i]['id']] = obj[i]['second_button'];
                }
              }
            }
        });
      }
      $(document).ready(function(){
          intervalID = setInterval(ReceveData, 1000);
      });
      </script>
