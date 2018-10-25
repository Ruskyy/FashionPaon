<?php
function login($username,$password){
  if(empty($username) || empty($password)){
    echo '<div class="alert alert-warning" role="alert">
    Campos nao se podem encontar em branco
    </div>';
  }else {
    include 'connections/conn.php';
    $qlogin = mysqli_query($conn,"SELECT func_user, func_pass, func_tipo, func_id, func_avatar_path
       FROM funcionario
       WHERE func_user = '$username' AND func_pass = '$password'");
    $alogin = mysqli_fetch_array($qlogin);
    $count= mysqli_num_rows($qlogin);
    if($count == 0){
    echo '<div class="alert alert-danger" role="alert">
    Dados invalidos
    </div>';
    }
    else{
      session_start();
      $_SESSION["id"] = $alogin["func_id"];
      $_SESSION["tipo"] = $alogin["func_tipo"];
      $_SESSION["username"] = $alogin["func_user"];
      $_SESSION["imagepath"] = $alogin["func_avatar_path"];
      if ($alogin["func_tipo"] != 1) {
        echo "<meta http-equiv='refresh' content='0; URL=user/index.php'>";
      }else {
        echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
      }
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

 ?>
