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
                              <input class="form-control form-control-lg" type="text" name="fname" value="" placeholder="Nome do Produto" required />
                            </div>
                            <div class="form-group">
                              <label>Categoria do Produto</label>
                              <select class="form-control" name="categoria" style="position:relative; top:15px;">
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
