<?php
if(isset($_POST['submeter'])){
  include '../../php/conn.php';
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

    //Encripta a password
    $encpassword =md5( $_POST['pass']);

    @mysqli_query($conn,"CALL usp_register('$_POST[user]','$encpassword','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]','$img_path')");

    echo 'sucesso';
  }else {
    if ($username) {
      echo 'O username é repetido';
    }if ($email) {
      echo 'O email é repetido';
    }
  }
  include '../../php/deconn.php';
}
?>
