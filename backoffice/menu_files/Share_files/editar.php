<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $id = $_POST['id'];
  $output = '';

  $dado=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cliente_id, cliente_tipo, cliente_password, cliente_apelido, cliente_nome, cliente_apelido, cliente_email, cliente_datanasc, cliente_morada, cliente_codigopostal, cliente_idpais, cliente_nif, cliente_tele, cliente_img_path  FROM cliente WHERE cliente_id = $id"));
  $decpassword = md5($dado['cliente_password']);
  $codigo = strtok($dado['cliente_codigopostal'],  '-');
  $postal = explode('-', $dado['cliente_codigopostal']);
  $curparis = mysqli_fetch_assoc(mysqli_query($conn,"SELECT paisId, paisNome FROM paises WHERE paisId = $dado[cliente_idpais]"));

$output .='
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="height:700px;">
                <div class="header">
                  <h4 class="title">Cliente</h4>
                  <p class="category">Informação do Cliente</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px; position:relative; top:-100px;">
                  <input type="hidden" id="id" value="'.$dado['cliente_id'].'">
                    <div class="row">
                      <div style=" border: 4px double #d9dbdd; width:130px; height:130px; position:relative; top:30px;left:610px;">
                        <img src="../'.$dado['cliente_img_path'].'" style="width:120px; height:120px;"/>
                      </div>
                      <div class="col-md-5" style="position:relative; left: 30px;">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nome</label>
                              <input class="form-control form-control-lg" type="text" id="fname" value="'.$dado['cliente_nome'].'" placeholder="First name"  />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Apelido</label>
                              <input class="form-control form-control-lg" type="text" id="lname" value="'.$dado['cliente_apelido'].'" placeholder="Last name"  />
                            </div>
                          </div>
                        </div>
                        <label>Username</label>
                        <input class="form-control form-control-lg" type="text" id="user" value="'.$dado['cliente_apelido'].'" placeholder="Username" >
                        <br>
                        <label>Data</label>
                        <input class="form-control form-control-lg" type="text" id="data" value="'.$dado['cliente_datanasc'].'" placeholder="Data" >
                        <br>
                        <label>Mail</label>
                        <input class="form-control form-control-lg" type="email" id="email" value="'.$dado['cliente_email'].'" placeholder="email@email.com" >
                        <br>
                        <label>Password</label>
                        <input class="form-control form-control-lg" type="text" id="password" value="'.$dado['cliente_password'].'" placeholder="email@email.com" disabled>
                        <br>
                        <button class="btn btn-primary btn-lg btn-block" onclick="myFunction_editt()" type="button">EDITAR</button>

                      </div>
                      <div class="col-md-5">
                        <div style="position:relative; top:5px; left: 100px;">
                        <div class="form-group" style="position:relative; top:45px;">
                          <label>Morada / Lote, nº Predio</label>
                          <input class="form-control form-control-lg" type="text" id="morada" value="'.$dado['cliente_morada'].'" placeholder="Morada" >
                        </div>
                        <br>
                        <div style="position:relative; top:24px;">
                          <label>Países</label>
                          <select class="form-control"id="paises" style="position:relative; top:6px;">';
                          $querypaises = "SELECT paisId, paisNome FROM paises";
                          $paises = mysqli_query($conn,$querypaises);
                          while ($pais=mysqli_fetch_assoc($paises)) {
                            $output.='<option value="'.$pais['paisId'].'"';if($pais['paisId'] == $dado['cliente_idpais']){$output.='selected';} $output.='>'.$pais['paisNome'].'</option>';
                          }
                            $output.='
                          </select>
                              <br>
                              <div class="row form-group">
                                <div class="col-xs-6">
                                  <label>Código</label>
                                    <input class="form-control form-control-lg" type="text" id="codigo" value="'.$codigo.'" placeholder="Codigo"  />
                                </div>
                                <div class="col-xs-6">
                                  <label>Postal</label>
                                    <input class="form-control form-control-lg" type="text" id="postal" value="'.$postal[1].'" placeholder="Postal"  />
                                </div>
                              </div>
                              <label>Telefone</label>
                              <input class="form-control form-control-lg" type="text" id="tele" value="'.$dado['cliente_tele'].'" placeholder="TELEFONE" maxlength="9" size="9" >
                              <br>
                              <label>NIF</label>
                              <input class="form-control form-control-lg" type="text" id="nif" value="'.$dado['cliente_nif'].'" placeholder="NIF" maxlength="9" size="9" >
                            </div>
                            </div>
                        <br>
                      </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>';
  echo $output;

  ?>
<!--  <script>
  $(document).ready(function(){
      $("#start").click(function(){
        var codigo = $('#codigo').val();
        var postal = $('#postal').val();
        var id = $('#id').val();
        var pass = $('#password').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var data = $('#data').val();
        var morada = $('#morada').val();
        var codpos = codigo+"-"+postal;
        var paises = $('#paises').val();
        var nif = $('#nif').val();
        var tele = $('#tele').val();
        var email = $('#email').val();
        var todo = codigo+""+postal+""+id+""+fname+""+lname+""+data+""+morada+""+codpos+""+paises+""+nif+""+tele+""+email;
        alert(todo);
        //myFunction_editt(id, pass, fname, lname, data, morada, codpos, paises, nif, tele, email);
    });
  });

</script>-->
