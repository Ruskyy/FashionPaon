<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];

  $dado = mysqli_query($conn,"SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco, produto_id, produto_nome, id_tamanho, nome_tamanho
                                FROM stock INNER JOIN produto ON stock_idproduto = produto_id INNER JOIN tamanho ON stock_prodtamanho = id_tamanho WHERE stock_id = $id");
  $dados=mysqli_fetch_assoc($dado);
?>
<div class="card">
    <div class="header">
        <h4 class="title">Striped Table with Hover</h4>
        <p id="btns" class="category">Here is a subtitle for this table</p>
    </div>
    <div class="content table-responsive table-full-width">
      <form id="form2"class="" method="post" style="padding: 20px;">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <input type="hidden" name="id" value="">
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Produto</label>
                  <input class="form-control form-control-lg" type="text" value="<?php echo $dados['produto_nome']; ?>" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <label>Preço</label>
                <input class="form-control form-control-lg" type="text" name="preco" value="<?php echo $dados['stock_prodpreco'].'€'; ?>" readonly>
              </div>
              <div class="col-md-1">
                <label>Tamanho</label>
                <input class="form-control form-control-lg" type="text" name="tamanho" value="<?php echo $dados['nome_tamanho']; ?>" readonly>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label>Quantidade</label>
                  <input id ="StockEncQuant" class="form-control form-control-lg" type="text" name="quantidade" value="1" readonly>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <button type="button" class="btn btn-primary btn-block" style="position:relative; top:23px;" onclick="myFunction_AllAddStock(0)">-</button>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <button type="button" class="btn btn-primary btn-block" style="position:relative; top:23px;" onclick="myFunction_AllAddStock(1)">+</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-8"></div>
            <div class="col-md-4">
              <label>Total</label>
              <input id="StockEncTotal" class="form-control form-control-lg" type="text" value="<?php echo $dados['stock_prodpreco'].'€'; ?>" readonly>
            </div>
          </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick=""> Adicionar </button>
      </form>
    </div>
</div>
