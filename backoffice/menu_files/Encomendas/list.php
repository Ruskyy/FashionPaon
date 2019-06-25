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
                                $queryidpublico = "SELECT
                                                    produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                                                      FROM produto WHERE produto_id = ".$stock['stock_idproduto'];
                                $prod = mysqli_fetch_assoc(mysqli_query($conn, $queryidpublico));
                                ?>
                                  <tr>
                                    <td><?php echo $prod["produto_nome"];?></td>
                                    <td><?php echo $stock["stock_prodtamanho"];?></td>
                                    <td><?php echo $rows["ad_encomendas_quantidades"];?></td>
                                    <td><?php echo $rows["ad_encomendas_preco"];?></td>
                                    <td><?php echo date("d/m/Y G:i:s",strtotime($rows["ad_encomendas_data"]));?></td>
                                    <td><?php echo date("d/m/Y G:i:s",strtotime($rows["ad_encomendas_datafim"]));?></td>
                                    <td id="<?php echo "Enc_hora_".$rows["ad_encomendas_id"]; ?>"></td>
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
      var intervalID = null;
      function ReceveData(){
        $.ajax({
            url:"menu_files/Encomendas/config_page.php",
            method:"POST",
            success:function(data){
              obj = JSON.parse(data);
              for (var i = 0; i < obj.length; i++) {
                $( "#Enc_hora_"+obj[i]['id'] ).html( obj[i]['horas'] );
                $( "#Enc_button_"+obj[i]['id'] ).html( obj[i]['first_button'] );
                if(obj[i]['second_button'] != ""){
                  $( "#Enc_button2_"+obj[i]['id'] ).html( obj[i]['second_button'] );
                }
              }
            }
        });
      }
      $(document).ready(function(){
          intervalID = setInterval(ReceveData, 1000);
      });
      </script>
