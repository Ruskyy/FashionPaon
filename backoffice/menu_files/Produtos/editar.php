<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];
  $output = '';

  $dado=mysqli_fetch_assoc(mysqli_query($conn,"SELECT produto_id, produto_idcategoria,	produto_nome,	produto_idmarca,	produto_desc,	id_publico FROM produto WHERE produto_id = $id"));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produtos</h4>
                    <p id="btns" class="category">Editar produtos</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form id="formProd" class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nome do Produto</label>
                              <input id="nome_produto" class="form-control form-control-lg" type="text" name="nome_produto" value="<?php echo $dado['produto_nome'] ; ?>" placeholder="Nome do Produto"  />
                            </div>
                            <div class="form-group">
                              <label>Categoria do Produto</label>
                              <select id="categoria_produto" class="form-control" name="categoria_produto" style="position:relative; top:15px;">
                                <?php
                                include '../../../php/conn.php';
                                $querycategoria = "SELECT categoria_id, categoria_nome FROM categoria";
                                $categorias = mysqli_query($conn,$querycategoria);
                                while ($categoria=mysqli_fetch_assoc($categorias)) {
                                  ?>
                                <option value="<?php echo $categoria['categoria_id'];?>" <?php if($dado['produto_idcategoria'] == $categoria['categoria_id']){echo 'selected';} ?>><?php echo $categoria['categoria_nome'];?></option>
                              <?php
                            }
                            include '../../../php/deconn.php';
                              ?>
                              </select>
                            </div>
                            <br>
                            <div class="form-group">
                              <label>Público</label>
                              <select id="categoria_publico" class="form-control" name="categoria_publico" style="position:relative; top:15px;">
                                <?php
                                include '../../../php/conn.php';
                                $querypublico = "SELECT id_publico, nome_publico FROM publico";
                                $publico = mysqli_query($conn,$querypublico);
                                while ($genero=mysqli_fetch_assoc($publico)) {
                                  ?>
                                <option value="<?php echo $genero['id_publico'];?>"<?php if($dado['id_publico'] == $genero['id_publico']){echo 'selected';} ?>><?php echo $genero['nome_publico'];?></option>
                              <?php
                              }
                              include '../../../php/deconn.php';
                                ?>
                                </select>
                            </div>
                            <br>
                              <div class="form-group">
                              <label>Descrição</label>
                              <input type="text" name="descricao_produto" value="<?php echo $dado['produto_desc'] ; ?>" class="form-control form-control-lg">
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="myFunction_AllAddProd(<?php echo $dado['produto_id'];?>,2)" name="submeter_produto"> Gravar </button>

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
