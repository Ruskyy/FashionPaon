<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];
  $output = '';
  $output.='
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="height:750px;">
                <div class="header">
                  <h4 class="title">Admins > Adicionar</h4>
                </div>
                <div class="content table-responsive table-full-width">
                  <form id="form" class="" method="post" style="padding: 20px; position:relative; top:-100px;"  enctype="multipart/form-data">
                    <div class="row">
                      <div style=" border: 4px double #d9dbdd; width:130px; height:130px; position:relative; top:30px;left:610px;">
                        <img id="output" src=""style="width:120px; height:120px;"/>
                      </div>
                      <script>
                        var loadFile = function(event) {
                          var reader = new FileReader();
                          reader.onload = function(){
                            var output = document.getElementById("output");
                            output.src = reader.result;
                          };
                          reader.readAsDataURL(event.target.files[0]);
                        };
                      </script>
                      <div class="col-md-5" style="position:relative; left:40px;">
                        <input id="file" type="file" name="image" accept="image/*" onchange="loadFile(event)">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>First name</label>
                              <input id="fname" class="form-control form-control-lg" type="text" name="fname"  placeholder="First name" required />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Last name</label>
                              <input id="lname" class="form-control form-control-lg" type="text" name="lname"  placeholder="Last name"  required/>
                            </div>
                          </div>
                        </div>
                        <label>Username</label>
                        <input id="user" class="form-control form-control-lg" type="text" name="user"  placeholder="Username" required>
                        <br>
                        <label>Password</label>
                        <input id="pass" class="form-control form-control-lg" type="password" name="pass"  placeholder="Password" required>
                        <br>
                        <label>Confirm Password</label>
                        <input id="confpass" class="form-control form-control-lg" type="password" name="confpass"  placeholder="Confirm Password" required>
                        <br>
                        <label>Date</label>
                        <input id="data" class="form-control form-control-lg" type="date" name="data"  required>
                        <br>
                        <label>Mail</label>
                        <input id="email" class="form-control form-control-lg" type="email" name="email"  placeholder="email@email.com" required>
                      </div>
                      <div class="col-md-5">
                        <div style="position:relative; top:30px; left: 100px;">
                        <div class="form-group" style="position:relative; top:45px;">
                          <label>Morada / Lote, nº Predio</label>
                          <input id="morada" class="form-control form-control-lg" type="text" name="morada"  placeholder="Morada" required>
                          <input id="morada2" class="form-control form-control-lg" type="text" name="morada2"  placeholder="Lote, nº Predio" required>
                        </div>
                        <br>
                        <div style="position:relative; top:24px;">
                          <label>Países</label>
                              <select class="form-control" id="paises" name="paises" style="position:relative; top:6px;">';
                              $querypaises = "SELECT paisId, paisNome FROM paises";
                              $paises = mysqli_query($conn,$querypaises);
                              while ($pais=mysqli_fetch_assoc($paises)) {
                                $output.='<option value="<'.$pais['paisId'].'">'.$pais['paisNome'].'</option>';
                              }
                                $output.='
                              </select>
                              <br>
                              <div class="row form-group">
                                <div class="col-xs-6">
                                  <label>Código</label>
                                    <input id="codigo" class="form-control form-control-lg" type="number" name="codigo"  placeholder="Codigo" required />
                                </div>
                                <div class="col-xs-6">
                                  <label>Postal</label>
                                    <input id="postal" class="form-control form-control-lg" type="number" name="postal"  placeholder="Postal" required />
                                </div>
                              </div>
                              <label>Telefone</label>
                              <input id="tele" class="form-control form-control-lg" type="number" name="tele"  placeholder="TELEFONE" maxlength="9" size="9" required>
                              <br>
                              <label>NIF</label>
                              <input id="nif" class="form-control form-control-lg" type="number" name="nif"  placeholder="NIF" maxlength="9" size="9" required>
                            </div>

                            </div>
                        <br>
                      </div>
                      </div>
                      <br>
                      <button type="button" class="btn btn-primary btn-lg btn-block" name="submeter" id="btn_sub" onclick="Function_AddCliente(1)"> Adicionar </button>
                      <script type="text/java">
                          function enforce_maxlength(event) {
                            var t = event.target;
                            if (t.hasAttribute("maxlength")) {
                            t.value = t.value.slice(0, t.getAttribute("maxlength"));
                              }
                            }
                            document.body.addEventListener("input", enforce_maxlength);
                      </script>
                    </form>
                </div>
            </div>
        </div>';
        echo $output;
        include '../../../php/deconn.php';
?>
