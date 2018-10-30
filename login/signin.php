<div class=" card col-md-5 mx-auto" style="padding:2%">
  <img class="card-img-top" src="00_Recources/logo.png" alt="Card image cap" width="50%" height="50%">
  <div class="card-body">
    <form class="" action="" method="post">
      <input class="form-control form-control-lg" type="text" placeholder="Username" name="username" required>
      <br>
      <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" required>
      <br>
      <button type="input" class="btn btn-primary btn-lg btn-block" id="btn_sub" name="login"> Login </button>
    </form>
  </div>
    <?php
    if (isset($_POST['login'])) {
      include 'php/functions.php';
      login($_POST['username'],$_POST['password']);
    } ?>
  <div class="row">
    <div class="mx-auto text-center">
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

<!-- INSERT INTO cliente
(cliente_id, cliente_username, cliente_password, cliente_nome, cliente_apelido, cliente_datanasc, cliente_morada, cliente_codigopostal, cliente_idpais, cliente_nif, cliente_tele, cliente_email, cliente_tipo, cliente_img_path)
VALUES (id,username,password,nome,apelido,datanasc,morada,codigopostal,idpais,nif,tele,email,tipo,imgpath) -->
