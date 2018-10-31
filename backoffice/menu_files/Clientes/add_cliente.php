<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="height:750px;">
                <div class="header">
                  <h4 class="title">Adicionar</h4>
                  <p class="category">Clientes</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px; position:relative; top:-100px;">
                    <div class="row">
                      <div style=" border: 4px double #d9dbdd; width:130px; height:130px; position:relative; top:30px;left:610px;">
                        <img id="output"style="width:120px; height:120px;"/>
                      </div>
                      <script>
                        var loadFile = function(event) {
                          var reader = new FileReader();
                          reader.onload = function(){
                            var output = document.getElementById('output');
                            output.src = reader.result;
                          };
                          reader.readAsDataURL(event.target.files[0]);
                        };
                      </script>
                      <div class="col-md-5" style="position:relative; left:40px;">
                        <input type="file" name="" accept="image/*" onchange="loadFile(event)">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>First name</label>
                              <input class="form-control form-control-lg" type="text" name="fname" value="" placeholder="First name" required />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Last name</label>
                              <input class="form-control form-control-lg" type="text" name="lname" value="" placeholder="Last name"  required/>
                            </div>
                          </div>
                        </div>
                        <label>Username</label>
                        <input class="form-control form-control-lg" type="text" name="user" value="" placeholder="Username" required>
                        <br>
                        <label>Password</label>
                        <input class="form-control form-control-lg" type="password" name="pass" value="" placeholder="Password" required>
                        <br>
                        <label>Confirm Password</label>
                        <input class="form-control form-control-lg" type="password" name="confpass" value="" placeholder="Confirm Password" required>
                        <br>
                        <label>Date</label>
                        <input class="form-control form-control-lg" type="date" name="data" value="" required>
                        <br>
                        <label>Mail</label>
                        <input class="form-control form-control-lg" type="email" name="email" value="" placeholder="email@email.com" required>
                      </div>
                      <div class="col-md-5">
                        <div style="position:relative; top:30px; left: 100px;">
                        <div class="form-group" style="position:relative; top:45px;">
                          <label>Morada / Lote, nº Predio</label>
                          <input class="form-control form-control-lg" type="text" name="morada" value="" placeholder="Morada" required>
                          <input class="form-control form-control-lg" type="text" name="morada2" value="" placeholder="Lote, nº Predio" required>
                        </div>
                        <br>
                        <div style="position:relative; top:24px;">
                          <label>Países</label>
                              <select class="form-control" name="paises" style="position:relative; top:6px;">
                                <option value="0">-- Select --</option>
                                <!--
                                $paises = mysqli_query($conn,"SELECT numero_pais, pais FROM pais ");
                                while ($row=mysqli_fetch_assoc($paises)){
                                  echo '<option value="'.$row['numero_pais'].'">'.$row['pais'].'</option>';
                                }
                               -->
                              </select>
                              <br>
                              <div class="row form-group">
                                <div class="col-xs-6">
                                  <label>Código</label>
                                    <input class="form-control form-control-lg" type="number" name="codigo" value="" placeholder="Codigo" required />
                                </div>
                                <div class="col-xs-6">
                                  <label>Postal</label>
                                    <input class="form-control form-control-lg" type="number" name="postal" value="" placeholder="Postal" required />
                                </div>
                              </div>
                              <label>Telefone</label>
                              <input class="form-control form-control-lg" type="number" name="tele" value="" placeholder="TELEFONE" maxlength="9" size="9" required>
                              <br>
                              <label>NIF</label>
                              <input class="form-control form-control-lg" type="number" name="nif" value="" placeholder="NIF" maxlength="9" size="9" required>
                            </div>
                            </div>
                        <br>
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


            <!--  Model for ajax
            <tr>
              <td>1</td>
              <td>Dakota Rice</td>
              <td>$36,738</td>
              <td>Niger</td>
              <td>
                <button type="button" rel="tooltip" title="List" class="btn btn-warning btn-simple btn-xs">
                    <i class="fa fa-list-alt"></i>
                </button>
                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                    <i class="fa fa-times"></i>
                </button>
              </td>

            </tr>

            -->
