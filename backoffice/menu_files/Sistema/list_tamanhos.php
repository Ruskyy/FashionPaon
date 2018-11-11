<?php
include '../../../php/conn.php';
$querycat = "SELECT categoria_id, categoria_nome FROM categoria";
$categorias = mysqli_query($conn, $querycat);



include '../../../php/deconn.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Tamanhos</h4>
                    <p class="category">Lista Tamanhos</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="form-group">
                            <label>Filtro por Categoria</label>
                            <select id="select_categoria" class="form-control" name="list_categoria">
                              <option value="0">Mostrar tudo</option>
                              <?php
                              include '../../../php/conn.php';

                              while ($categoria = mysqli_fetch_assoc($categorias)) {
                                echo $categoria['categoria_id'];
                              ?>
                              <option value="<?php echo $categoria['categoria_id']; ?>"> <?php echo $categoria['categoria_nome']; ?> </option>
                              <?php
                              }
                              include '../../../php/deconn.php';?>

                            </select>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div id="btns"></div>
                      <br>
                      <div id="table"></div>

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
          <div id="sub_menu_aqui"></div>
    </div>
</div>
<script>
$(document).ready(function(){
  var out="";
  out = $( "#select_categoria" ).val();
  $tipo = out;
  $( "#btscryp" ).remove();
  $.ajax({
      url:"menu_files/Sistema/lista_tamanho.php",
      method:"POST",
      data: {tipo: $tipo},
      success:function(data){
        $('#table').html(data);
      }
  });
  $.ajax({
      url:"menu_files/Sistema/add_tamanho.php",
      method:"POST",
      data: {tipo: $tipo},
      success:function(data){
        $('#sub_menu_aqui').html(data);
      }
  });
  $( "#select_categoria" ).change(function() {
    out = $( "#select_categoria" ).val();
    $tipo = out;
    $( "#btscryp" ).remove();
    $.ajax({
        url:"menu_files/Sistema/lista_tamanho.php",
        method:"POST",
        data: {tipo: $tipo},
        success:function(data){
          $('#table').html(data);
        }
    });
  });
});
</script>
