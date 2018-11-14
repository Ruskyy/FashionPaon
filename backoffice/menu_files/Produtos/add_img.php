<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];

  $dado=mysqli_fetch_assoc(mysqli_query($conn,"SELECT produto_id, produto_idcategoria,	produto_nome,	produto_idmarca,	produto_desc,	id_publico FROM produto WHERE produto_id = $id"));
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produtos</h4>
                    <p id="btns" class="category">Adicionar Imagens</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form id="form" class="" method="post" style="padding: 20px;" enctype="multipart/form-data">
                    <div class="row">
                      <div  class="change" style=" border: 4px double #d9dbdd; width:520px; height:330px; position:relative;">
                        <img class="change" id="output"style="width:512px; height:322px;"/>
                      </div>
                      <script>

                      //->Aumentar X da Imagem
                      $("#3210").click(function(){
                        $(".change").animate({
                          width: '+=10px'
                       });
                      });

                      $("#3211").click(function(){
                        $(".change").animate({
                          width: '-=10px'
                       });
                      });

                      $("#3212").click(function(){
                        $(".change").animate({
                          height: '+=10px'
                       });
                      });

                      $("#3213").click(function(){
                        $(".change").animate({
                          height: '-=10px'
                       });
                      });
                        var loadFile = function(event) {
                          var reader = new FileReader();
                          reader.onload = function(){
                            var output = document.getElementById('output');
                            output.src = reader.result;
                          };
                          reader.readAsDataURL(event.target.files[0]);
                        };
                      </script>
                      <div class="col-md-5">
                        <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
                        <br>
                        <div id='btscryp' class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'>
                          <div class='btn-group mr-2' role='group' aria-label='First group'>
                            <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3210" >x +</button>
                            <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3211" >x -</button>
                            <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3212" >y +</button>
                            <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3213" >y -</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Categoria da Imagem</label>
                              <select class="form-control" name="categoria_img" style="position:relative; top:15px;">
                                <option value="0">--SELECT--</option>
                                <?php
                                include '../../../php/conn.php';
                                $queryimg = "SELECT id_imagem, id_produto, id_imgcategoria, nome_imagem  FROM imagem WHERE id_produto = '$id'";
                                $img = mysqli_fetch_assoc(mysqli_query($conn,$queryimg));
                                if($img){$querycategoria = "SELECT imgcategoria.id_imgcategoria, nome_imgcategoria FROM imgcategoria
                                                              WHERE not exists (select imagem.id_imgcategoria
                                                                from imagem where imagem.id_imgcategoria = imgcategoria.id_imgcategoria
                                                                  and imagem.id_produto = '$id')";}
                                else{$querycategoria = "SELECT imgcategoria.id_imgcategoria, nome_imgcategoria FROM imgcategoria";}
                                $categorias = mysqli_query($conn,$querycategoria);
                                while ($categoria=mysqli_fetch_assoc($categorias)){
                                  ?>
                                <option value="<?php echo $categoria['id_imgcategoria'];?>"><?php echo $categoria['nome_imgcategoria'];?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="button" class="btn btn-primary btn-lg btn-block" name="submeter" onclick="myFunction_AllAddProd(<?php echo $id;?>,3)"> Adicionar </button>
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
