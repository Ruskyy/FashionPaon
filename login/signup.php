<?php
include 'php/conn.php';
include 'php/functions.php';
?>

<div class="card col-md-12 mx-auto" style="padding:2%">
  <div class="row col-md-2" style="margin-bottom:2%;">
    <img class="img-card-top" src="00_Recources/logo_text.png" alt="Card image cap">
  </div>
  <form class="" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control form-control-lg" type="text" name="fname" value="" placeholder="First name" required />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control form-control-lg" type="text" name="lname" value="" placeholder="Last name"  required/>
            </div>
          </div>
        </div>
        <input class="form-control form-control-lg" type="text" name="user" value="" placeholder="Username" required>
        <br>
        <input class="form-control form-control-lg" type="password" name="pass" value="" placeholder="Password" required>
        <br>
        <input class="form-control form-control-lg" type="password" name="confpass" value="" placeholder="Confirm Password" required>
        <br>
        <input class="form-control form-control-lg" type="date" name="data" value="" required>
        <br>
        <input class="form-control form-control-lg" type="email" name="email" value="" placeholder="email@email.com" required>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input class="form-control form-control-lg" type="text" name="morada" value="" placeholder="Morada" required>
          <input class="form-control form-control-lg" type="text" name="morada2" value="" placeholder="Lote, nº Predio" required>
        </div>
        <select class="form-control" name="paises">
          <option value="0">PAIS</option>
          <!--
          $paises = mysqli_query($conn,"SELECT numero_pais, pais FROM pais ");
          while ($row=mysqli_fetch_assoc($paises)){
            echo '<option value="'.$row['numero_pais'].'">'.$row['pais'].'</option>';
          }
         -->
        </select>
        <br>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <input class="form-control form-control-lg" type="number" name="codigo" value="" placeholder="Codigo" required />
            </div>
          </div>
          <h2>-</h2>
          <div class="col-md-5">
            <div class="form-group">
              <input class="form-control form-control-lg" type="number" name="postal" value="" placeholder="Postal" required />
            </div>
          </div>
        </div>
        <br>
        <input class="form-control form-control-lg" type="number" name="tele" value="" placeholder="TELEFONE" maxlength="9" size="9" required>
        <br>
        <input class="form-control form-control-lg" type="number" name="nif" value="" placeholder="NIF" maxlength="9" size="9" required>
        <br>
        <input type="file" class="form-control" name="image" />
      </div>
      </div>
      <br>
      <button type="submit" class="btn btn-primary btn-lg btn-block" name="submeter" id="btn_sub"> Registar </button>
    </form>

  <?php
  if(isset($_POST['submeter'])){
    include 'php/conn.php';
    $codpost = $_POST['codigo'].'-'.$_POST['postal'];

    //falta  cliente_img_path
    /*mysqli_query($conn,"INSERT INTO  cliente (  cliente_username,cliente_password, cliente_nome,	  cliente_apelido,	 cliente_datanasc,  cliente_morada,	 	  cliente_codigopostal,	 	 cliente_idpais ,	 	cliente_nif	,	 cliente_tele	,	 cliente_email	,	  cliente_tipo )
    VALUES ('$_POST[user]','$_POST[pass]','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]',0)");
    */

    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

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
         move_uploaded_file($file_tmp,"images/uploads/".$generatedname);
      }else{
         // echo($errors);
      }
    }else {
        $img_path="images/unknown.png";
    }

    $username=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_username FROM cliente WHERE cliente_username='$_POST[user]'"));
    $email=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_email FROM cliente WHERE cliente_email='$_POST[email]'"));

    if(!$username && !$email){
      $codpost = $_POST['codigo'].'-'.$_POST['postal'];
      //falta  cliente_img_path

      /*mysqli_query($conn,"INSERT INTO  cliente (cliente_username, cliente_password, cliente_nome, cliente_apelido, cliente_datanasc, cliente_morada, cliente_codigopostal, cliente_idpais, cliente_nif,	cliente_tele, cliente_email,	cliente_tipo )
      VALUES ('$_POST[user]','$_POST[pass]','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]',0)");*/


      @mysqli_query($conn,"CALL usp_register('$_POST[user]','$_POST[pass]','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]','$img_path')");

      echo 'sucesso';
    }else {
      if ($username) {
        echo 'O username é repetido';
      }if ($email) {
        echo 'O email é repetido';
      }
    }

    include 'php/deconn.php';
  }
  ?>

  <div class="row">
    <div class="mx-auto text-center" style="margin-top:2%;">
      <?php
        if ($login=='register') {
      ?>
          <a href="login.php?opc=login">Sign In</a>
      <?php
          }
        else{
      ?>
          <a href="login.php?opc=register">Sign Up</a>
      <?php
          }
      ?>
    </div>
  </div>

</div>
