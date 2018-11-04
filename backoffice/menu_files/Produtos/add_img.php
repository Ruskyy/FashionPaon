<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produtos</h4>
                    <p id="btns" class="category">Adicionar Imagens</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px;">
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
                        <input type="file" name="" accept="image/*" onchange="loadFile(event)">
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
                                <option value="0">-- Select --</option>
                                <!--
                                $paises = mysqli_query($conn,"SELECT numero_pais, pais FROM pais ");
                                while ($row=mysqli_fetch_assoc($paises)){
                                  echo '<option value="'.$row['numero_pais'].'">'.$row['pais'].'</option>';
                                }
                               -->
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-lg btn-block" name="submeter" id="btn_sub"> Adicionar </button>
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
