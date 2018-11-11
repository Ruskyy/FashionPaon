<?php
function login($username,$password){
  if(empty($username) || empty($password)){
    echo '<div class="alert alert-warning" role="alert">
    Campos nao se podem encontar em branco
    </div>';
  }else {
    include 'conn.php';

    $unencryptedpassword = md5($password);

    $qlogin = mysqli_query($conn,"CALL usp_login('$username','$unencryptedpassword')");
    $alogin = mysqli_fetch_array($qlogin);
    $count= mysqli_num_rows($qlogin);
    if ($count != 0){
        session_start();
        $_SESSION["id"] = $alogin["cliente_id"];
        $_SESSION["tipo"] = $alogin["cliente_tipo"];
        $_SESSION["username"] = $alogin["cliente_username"];
        $_SESSION["nome"] = $alogin["cliente_nome"];
        $_SESSION["apelido"] = $alogin["cliente_apelido"];
        $_SESSION["datanasc"] = $alogin["cliente_datanasc"];
        $_SESSION["morada"] = $alogin["cliente_morada"];
        $_SESSION["codigopos"] = $alogin["cliente_codigopostal"];
        $_SESSION["idpais"] = $alogin["cliente_idpais"];
        $_SESSION["nif"] = $alogin["cliente_nif"];
        $_SESSION["tele"] = $alogin["cliente_tele"];
        $_SESSION["email"] = $alogin["cliente_email"];
        $_SESSION["imagepath"] = $alogin["cliente_img_path"];
        if ($alogin["cliente_tipo"] != 1) {
        echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
          // echo "KAPPA";
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
      // if($_SESSION["tipo"] != 1){
        echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
      // }
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

function addTamanho($nome, $cat){
include 'conn.php';
  $querytam = "SELECT nome_tamanho, id_categoria_tamanho FROM tamanho";
  $listatamanhos = mysqli_query($conn, $querytam);

  $queryaddtam = "INSERT INTO tamanho(nome_tamanho,id_categoria_tamanho) VALUES('$nome','$cat')";
  $result = mysqli_query($conn, $querytam." WHERE nome_tamanho like '$nome' AND id_categoria_tamanho = '$cat'");
  $count = mysqli_num_rows($result);
    if ($count == 0) {
      mysqli_query($conn,$queryaddtam);
    }
  include 'deconn.php';
}

 ?>
