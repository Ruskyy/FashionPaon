<?php if (isset($_POST['editar'])) {
  include '../php/conn.php';
  require_once '../php/functions.php';
  $codpost = $_POST['codigo'].'-'.$_POST['postal'];
  $query = "CALL usp_edit_cliente('$_POST[id]','$_POST[password]','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]')";
  mysqli_query($conn,$query);
  include '../php/deconn.php';
} ?>



<?php
  if (isset($_REQUEST['addtamanho'])) {
    require_once '../php/functions.php';
    addTamanho($_POST['nome'], $_POST['categoria_insert']);
  }
 ?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="header">
            <h4 class="title">ADICIONAR TAMANHOS</h4>
        </div>

      <div class="content table-responsive table-full-width">
      <form class="" method="post">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
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
              <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" value="" placeholder="Nome Categoria" class="form-control form-control-lg">
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="addtamanho" id="btn_sub"> Adicionar </button>
            </div>
            </div>
            </div>
            </div>
            </div>
            </form>
          </div>
      </div>
    </div>
    </div>
    </div>
