<?php

$id = $_POST['id'];

 ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produtos</h4>
                    <p id="btns" class="category">Adicionar Stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form id="form"class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Stock</label>
                                  <select class="form-control" name="categoria_stock">
                                    <option value="0">-- Select --</option>
                                    <?php
                                    include '../../../php/conn.php';
                                    $querystock = "SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco FROM stock WHERE stock_idproduto = '$id'";
                                    $stock = mysqli_fetch_assoc(mysqli_query($conn,$querystock));
                                    $querystockquant = "SELECT produto_id, produto_idcategoria,	produto_nome,	produto_idmarca,	produto_desc,	id_publico FROM produto WHERE produto_id = $id";
                                    $stockquant = mysqli_fetch_assoc(mysqli_query($conn,$querystockquant));
                                    //SELECT id_tamanho, nome_tamanho, id_categoria_tamanho FROM tamanho WHERE exists (select stock_idproduto from stock where stock_prodtamanho = id_categoria_tamanho and id_tamanho != '1' and stock_idproduto  = '1')
                                    if($stock){$querycategoria = "SELECT id_tamanho	nome_tamanho, id_categoria_tamanho FROM tamanho WHERE not exists (select stock_idproduto from stock where  and  = '$id')";}
                                    else{$querycategoria = "SELECT id_tamanho, nome_tamanho, id_categoria_tamanho FROM tamanho WHERE id_categoria_tamanho = $stockquant['produto_idcategoria']";}
                                    $categorias = mysqli_query($conn,$querycategoria);
                                    while ($categoria=mysqli_fetch_assoc($categorias)){
                                      ?>
                                      <option value="<?php echo $tamanho['id_tamanho'] ?>"><?php echo $tamanho['nome_tamanho'] ?></option>

                                      <?php
                                    }

                                    include '../../../php/deconn.php';
                                     ?>
                                 </select>
                          </div>
                          <div class="form-group">
                              <label>Preço</label>
                              <input class="form-control form-control-lg" type="text" name="preco" value="" maxlength="6"oninput="this.value = this.value.replace(/[^0-9,]/g, '').replace(/(\,,*)\,/g, '$1');">
                          </div>
                        </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-lg btn-block" name="submeter_stock" id="btn_sub"> Adicionar </button>
                      <script type="text/java">
                                  function enforce_maxlength(event) {
                                    var t = event.target;
                                    if (t.hasAttribute('maxlength')) {
                                    t.value = t.value.slice(0, t.getAttribute('maxlength'));
                                      }
                                    }
                                    document.body.addEventListener('input', enforce_maxlength);
                              </script>
                    </form>
                </div>
              </div>
          </div>
    </div>
</div>
