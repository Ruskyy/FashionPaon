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
                  <form class="" method="post" style="padding: 20px;">
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

                                    $quertyidcat = "SELECT produto_idcategoria FROM produto WHERE produto_id = '$id'";
                                    $querytam = "SELECT id_tamanho, nome_tamanho, id_categoria_tamanho, categoria_nome FROM tamanho
                                    INNER JOIN categoria ON tamanho.id_categoria_tamanho = categoria.categoria_id WHERE id_categoria_tamanho = ($quertyidcat)";
                                    $tamanhos = mysqli_query($conn, $querytam);

                                    while ($tamanho = mysqli_fetch_assoc($tamanhos)) {
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
