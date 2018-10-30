<?php
function login($username,$password){
  if(empty($username) || empty($password)){
    echo '<div class="alert alert-warning" role="alert">
    Campos nao se podem encontar em branco
    </div>';
  }else {
    include 'conn.php';
    $hashtest = mysqli_fetch_array(mysqli_query($conn, "SELECT cliente_password FROM cliente WHERE cliente_username = '$username'"));

    if (password_verify($password,$hashtest['cliente_password'])){
      echo "ENTROU";
      $qlogin = mysqli_query($conn,"CALL usp_login('$_POST[username]','$hashtest[cliente_password]')");
      @$alogin = mysqli_fetch_array($qlogin);
        session_start();
        $_SESSION["id"] = $alogin["cliente_id"];
        $_SESSION["username"] = $alogin["cliente_username"];
        $_SESSION["tipo"] = $alogin["cliente_tipo"];
        $_SESSION["nome"] = $alogin["cliente_nome"];
        $_SESSION["apelido"] = $alogin["cliente_apelido"];
        $_SESSION["datanasc"] = $alogin["cliente_datanasc"];
        $_SESSION["morada"] = $alogin["cliente_morada"];
        $_SESSION["idpais"] = $alogin["cliente_idpais"];
        $_SESSION["nif"] = $alogin["cliente_nif"];
        $_SESSION["tele"] = $alogin["cliente_tele"];
        $_SESSION["email"] = $alogin["cliente_email"];
        $_SESSION["imagepath"] = $alogin["cliente_img_path"];
        if ($alogin["cliente_tipo"] != 1) {
          /*echo "<meta http-equiv='refresh' content='0; URL=index.html'>";*/
          echo "KAPPA";
        }else {
          echo "<meta http-equiv='refresh' content='0; URL=backoffice/dashboard.php'>";
        }
      }else {
      echo '<div class="alert alert-danger" role="alert">
      Dados invalidos
      </div>';
    }
  }
}


function validaruser(){
  if(!$_SESSION["id"]){
    echo "<meta http-equiv='refresh' content='0; URL=login.php'>";
  }
}

/*Verifica Admin*/
function validar(){
  if(!$_SESSION["id"]){
    echo "<meta http-equiv='refresh' content='0; URL=login.php'>";
  }else {
      if($_SESSION["tipo"] !=1){
        echo "<meta http-equiv='refresh' content='0; URL=user/index.php'>";
      }
  }
}


function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

 ?>
