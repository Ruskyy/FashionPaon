<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];
  $output = '';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produtos</h4>
                    <p id="btns" class="category">Adicionar produtos</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nome do Produto</label>
                              <input class="form-control form-control-lg" type="text" name="nome_produto" value="" placeholder="Nome do Produto" required />
                            </div>
                            <div class="form-group">
                              <label>Categoria do Produto</label>
                              <select class="form-control" name="categoria" style="position:relative; top:15px;">
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
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="addFunction()" name="submeter" id="btn_sub"> Adicionar </button>
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

<script type="text/javascript">
  function addFunction(){
    
  }
</script>
