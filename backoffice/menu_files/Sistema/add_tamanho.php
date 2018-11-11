<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Adicionar</h4>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Categoria do Tamanho</label>
                              <select id="categoria_tamanho" class="form-control" name="categoria_produto" style="position:relative; top:15px;">
                                <?php
                                include '../../../php/conn.php';
                                $querycategoria = "SELECT categoria_id, categoria_nome FROM categoria";
                                $categorias = mysqli_query($conn,$querycategoria);
                                while ($categoria=mysqli_fetch_assoc($categorias)) {
                                  ?>
                                <option value="<?php echo $categoria['categoria_id'];?>"><?php echo $categoria['categoria_nome'];?></option>
                              <?php
                            }
                            include '../../../php/deconn.php';
                              ?>
                              </select>
                            </div>
                            <br>
                              <div class="form-group">
                              <label>Tamanho</label>
                              <input id="tamanho" type="text" value="" class="form-control form-control-lg" placeholder="Tamanho">
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="myFunction_addtamanho()"> Adicionar </button>

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
