<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="height:750px;">
                <div class="header">
                  <h4 class="title">Adicionar</h4>
                  <p class="category">Clientes</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px; position:relative; top:-100px;"  enctype="multipart/form-data">
                    <div class="row">
                      <div style=" border: 4px double #d9dbdd; width:130px; height:130px; position:relative; top:30px;left:610px;">
                        <img id="output" src=".../.../images/unknown.png"style="width:120px; height:120px;"/>
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

                    <?php
                      if (isset($_POST['submeter'])) {
                        echo "CLICK";
                        include($_SERVER['DOCUMENT_ROOT'].'/php/conn.php');

                        $codpost = $_POST['codigo'].'-'.$_POST['postal'];

                        if(isset($_FILES['image'])){
                          $errors= array();
                          $file_name = $_FILES['image']['name'];
                          $file_size =$_FILES['image']['size'];
                          $file_tmp =$_FILES['image']['tmp_name'];
                          $file_type=$_FILES['image']['type'];
                          @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

                          $expensions= array("jpeg","jpg","png");

                          if(in_array($file_ext,$expensions)=== false){
                             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                          }

                          if($file_size > 2097152){
                             $errors[]='File size must be excately 2 MB';
                          }

                          if(empty($errors)==true){
                            $generatedname = generateRandomString(100).'.'.$file_ext;
                            $img_path="images/uploads/".$generatedname;
                             move_uploaded_file($file_tmp,"../../../images/uploads/".$generatedname);
                          }else{
                             echo($errors);
                          }
                        }else {
                            $img_path="images/unknown.png";
                        }

                        $username=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_username FROM cliente WHERE cliente_username='$_POST[user]'"));
                        $email=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_email FROM cliente WHERE cliente_email='$_POST[email]'"));

                        if(!$username && !$email){
                          $codpost = $_POST['codigo'].'-'.$_POST['postal'];
                          //falta  cliente_img_path

                        //  mysqli_query($conn,"INSERT INTO  cliente (cliente_username, cliente_password, cliente_nome, cliente_apelido, cliente_datanasc, cliente_morada, cliente_codigopostal, cliente_idpais, cliente_nif,	cliente_tele, cliente_email,	cliente_tipo )
                          //VALUES ('$_POST[user]','$_POST[pass]','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]',0)");

                          //Encripta a password
                          $encpassword =md5( $_POST['pass']);

                          mysqli_query($conn,"CALL usp_register('$_POST[user]','$encpassword','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]','$img_path')");

                          echo 'sucesso';
                        }else {
                          if ($username) {
                            echo 'O username é repetido';
                          }if ($email) {
                            echo 'O email é repetido';
                          }
                        }
                        //include '/php/deconn.php';
                        include($_SERVER['DOCUMENT_ROOT'].'/php/deconn.php');
                      }
                     ?>

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
