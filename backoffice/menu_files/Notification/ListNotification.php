<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

$dados = mysqli_query($conn,
    "SELECT ad_notification_id, ad_notification_content, ad_notification_tipo, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela
      FROM ad_notification ");
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
          </p>
        </div>
        <div class="content table-responsive table-full-width">
          <table class="table table-hover table-striped">
            <thead>
              <th>Id</th>
              <th>Mensagem</th>
              <th>Tipo</th>
              <th>Estado</th>
              <th>Tabela</th>
              <th>IdTabela</th>
            </thead>
            <tbody>
              <?php
                while ($rows = mysqli_fetch_assoc($dados)){
                  $dados2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ad_tabelas_nome, ad_tabelas_num FROM ad_tabelas WHERE ad_tabelas_num = '$rows[ad_notification_tabela]'"));
                  if($dados2['ad_tabelas_nome'] == 'ad_encomendas'){
                    $campos ="SELECT ad_encomendas_id, ad_encomendas_preco, ad_encomendas_quantidades, ad_encomendas_data, ad_encomendas_estado,
                                      ad_encomendas_id_tabela, ad_encomendas_tabela, ad_encomendas_datafim
                                        FROM ad_encomendas WHERE ad_encomendas_id = '$rows[ad_notification_idtabela]'";
                    $dadoss = mysqli_fetch_assoc(mysqli_query($conn, $campos));
                    $dados2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ad_tabelas_nome, ad_tabelas_num FROM ad_tabelas WHERE ad_tabelas_num = '$dadoss[ad_encomendas_tabela]'"));
                    if( $dados2['ad_tabelas_nome'] == "stock" ){
                        $dadossss = mysqli_fetch_assoc(mysqli_query($conn, "SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
                          FROM stock WHERE stock_id = '$dadoss[ad_encomendas_id_tabela]'"));
                      if($rows['ad_notification_tipo'] == 1){
                        if($dadossss){
                          $dadosss = mysqli_fetch_assoc( mysqli_query($conn, "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                            FROM produto WHERE produto_id = '$dadossss[stock_idproduto]'"));
                          $test = "".$rows['ad_notification_content'];
                          $test = str_replace("[&quantidade&]",$dadoss['ad_encomendas_quantidades'],$test);
                          $test = str_replace("[&nome&]",$dadosss['produto_nome'],$test);
                          $test = str_replace("[&tamanho&]",$dadossss['stock_prodtamanho'],$test);
                        }
                      }else if ($rows['ad_notification_tipo'] == 2) {

                      }else if ($rows['ad_notification_tipo'] == 3) {
                        $dadossss = mysqli_fetch_assoc(mysqli_query($conn,"SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco
                          FROM stock WHERE stock_id = '$dadoss[ad_encomendas_id_tabela]'"));
                        if($dadossss){
                            $dadosss = mysqli_fetch_assoc(mysqli_query($conn, "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                              FROM produto WHERE produto_id = '$dadossss[stock_idproduto]'"));
                            $test = "".$rows['ad_notification_content'];
                            $test = str_replace("[&quantidade&]",$dadoss['ad_encomendas_quantidades'],$test);
                            $test = str_replace("[&nome&]",$dadosss['produto_nome'],$test);
                            $test = str_replace("[&tamanho&]",$dadossss['stock_prodtamanho'],$test);
                        }
                      }else if ($rows['ad_notification_tipo'] == 4) {
                        $sl_notification = mysqli_fetch_assoc(mysqli_query($conn, "SELECT ad_notify_id, ad_notify_tabela, ad_notify_idtabela, ad_notify_tabela_2, ad_notify_idtabela_2, ad_notify_tipo
                          FROM ad_notify  where ad_notify_id = '$dado[ad_notification_id]'"));
                        $nome_tabela = getTabela($sl_notification['ad_notify_tabela']);
                        if($nome_tabela == "produto"){
                          $dadossss = mysqli_fetch_assoc( mysqli_query($conn, "SELECT produto_id, produto_idcategoria, produto_nome, produto_idmarca, produto_desc, id_publico
                            FROM produto where produto_id = '$sl_notification[ad_notify_idtabela]'"));
                          $test = "".$rows['ad_notification_content'];
                          $test = str_replace("[&nome&]",$dadossss['produto_nome'] ,$test);
                          $nome_tabela2 = getTabela($sl_notification['ad_notify_tabela_2']);
                          if($nome_tabela2 == "marca"){
                            $dadossss2 = mysqli_fetch_assoc( mysqli_query($conn, "SELECT id_marca, prod_marca_id, prod_id
                              FROM marca Inner Join marcas ON prod_marca_id = id_marca WHERE prod_id = '$sl_notification[ad_notify_idtabela_2]'"));
                            $test = str_replace("[&marca&]",$dadossss2['nome_marca'] ,$test);
                          }else if($nome_tabela2 == 'stock'){
                            $dadossss2 = mysqli_fetch_assoc( mysqli_query($conn, "SELECT *
                              FROM stock Inner join tamanho ON stock_prodtamanho = id_tamanho WHERE  stock_id = '$sl_notification[ad_notify_idtabela_2]'"));
                            $test = str_replace("[&stock&]",$dadossss2['nome_tamanho'] ,$test);
                          }else if($nome_tabela2 == 'imagem'){
                            $dadossss2 = mysqli_fetch_assoc( mysqli_query($conn, "SELECT *
                              FROM imagem Inner join imgcategoria ON imagem.id_imgcategoria = imgcategoria.id_imgcategoria WHERE id_imagem = '$sl_notification[ad_notify_idtabela_2]'"));
                            $test = str_replace("[&categoria&]",$dadossss2['imgcategoria.nome_imgcategoria'] ,$test);
                          }
                        }
                      }
                    }
                  }
                  ?>
                  <tr>
                    <td><?php echo $rows['ad_notification_id'];?></td>
                    <td><?php echo $test;?></td>
                    <td><?php echo $rows['ad_notification_tipo'];?></td>
                    <td><?php echo $rows['ad_notification_estado'];?></td>
                    <td><?php echo $dados2['ad_tabelas_nome']?></td>
                    <td><?php echo $rows['ad_notification_idtabela'];?></td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
