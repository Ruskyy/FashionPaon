<?php
include '../../../php/conn.php';
require_once '../../../php/functions.php';
$querycat = "SELECT categoria_id, categoria_nome FROM categoria";

$categorias = mysqli_query($conn, $querycat);
$categorialista = mysqli_query($conn, $querycat);

include '../../../php/deconn.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Tamanhos</h4>
                    <p id="btns" class="category">Lista Tamanhos</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="form-group">
                            <label>Filtro por Categoria</label>
                            <select class="form-control" name="list_categoria">
                              <option value="0">Mostrar tudo</option>
                              <?php
                              include '../../../php/conn.php';
                              while ($categoria = mysqli_fetch_assoc($categorias)) {
                                echo $categoria['categoria_id'];
                              ?>
                              <option value=" <?php echo $categoria['categoria_id']; ?> "> <?php echo $categoria['categoria_nome']; ?> </option>
                              <?php
                              }
                              include '../../../php/deconn.php';?>

                            </select>
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>

                      <table class="table table-hover table-striped">
                        <thead>
                          <th>Categoria</th>
                          <th>Nome</th>
                        </thead>
                        <tbody>
                          <?php while (@$tamanho = mysqli_fetch_assoc($listatamanhos)) {
                            ?>

                            <td><?php echo $tamanho['nome_tamanho']; ?></td>
                            <td><?php echo $tamanho['id_categoria_tamanho']; ?></td>

                            <?php
                          }  ?>
                          <td></td>
                          <td></td>
                        </tbody>
                      </table>

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

          <div class="col-md-6">
            <div class="card">
              <div class="header">
                  <h4 class="title">ADICIONAR TAMANHOS</h4>
              </div>

                <div class="content table-responsive table-full-width">
                  <form class="" method="post">
                    <div class="form-group">
                      <label>Filtro por Categoria</label>
                      <select class="form-control" name="categoria_insert">
                        <?php
                        include '../../../php/conn.php';
                        while ($categoria = mysqli_fetch_assoc($categorialista)) {
                        ?>
                        <option value=" <?php echo $categoria['categoria_id']; ?> "> <?php echo $categoria['categoria_nome']; ?> </option>
                        <?php
                        }
                        include '../../../php/deconn.php';
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" name="nome" value="" placeholder="Nome Categoria" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="addtamanho" id="btn_sub"> Adicionar </button>
                  </form>
                  
                </div>
            </div>
          </div>
    </div>
</div>
