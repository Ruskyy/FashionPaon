<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

  $tipo = $_POST['tipo'];
  $file = $_FILES['image'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $morada = $_POST['morada'];
  $morada2 = $_POST['morada2'];
  $codigo = $_POST['codigo'];
  $postal = $_POST['postal'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $confpass = $_POST['confpass'];
  $data = $_POST['data'];
  $email = $_POST['email'];
  $paises = $_POST['paises'];
  $tele = $_POST['tele'];
  $nif = $_POST['nif'];

  $codpost = $_POST['codigo'].'-'.$_POST['postal'];
  $moradlote = $_POST['morada'].'-'.$_POST['morada2'];

  if(isset($_FILES['image'])){
    //  echo $file_tmp;
    //  echo $_FILES['image']['error'];
  }if($_FILES['image']['size'] == 0 && $_FILES['image']['error'] != 0) {
    //-> erro 1 arrebentou > 5mb
    //-> erro 4 n existe ficheiro
    //-> erro 0 sem erros < 5mb e existe ficheiro
    //echo "Error";
}if($_FILES['image']['name'] == "") {
  //  echo "Empty file";
}


 $img_path="images/unknown.png";
if($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0) {
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
   $var = (string)$file_ext;

   $expensions= array("jpeg","jpg","png");
   if(in_array($file_ext,$expensions)== false){
      echo "Extension not allowed, please choose a JPEG or PNG file.";
   }else{
     $generatedname = generateRandomString(100).'.'.$file_ext;
     $img_path="images/uploads/".$generatedname;
      move_uploaded_file($file_tmp,"../../../images/uploads/".$generatedname);

      $username=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_username FROM cliente WHERE cliente_username='$user'"));
      $emails=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_email FROM cliente WHERE cliente_email='$email'"));

      if(!$username && !$emails){
        if($pass == $confpass){
          //Encripta a password
            $encpassword =md5($pass);
            if ($tipo == 0) {
              mysqli_query($conn,"CALL usp_register_user('$user','$encpassword','$fname','$lname','$data','$moradlote','$codpost','$paises','$nif','$tele','$email','$img_path')");
            }
            if ($tipo == 1) {
               mysqli_query($conn,"CALL usp_register_admin('$user','$encpassword','$fname','$lname','$data','$moradlote','$codpost','$paises','$nif','$tele','$email','$img_path')");
            }
            echo 'sucesso';
          }else{
            echo 'Passwords não são compatíveis';
          }
      }else {
        if ($username) {
          echo 'O username é repetido';
        }if ($emails) {
          echo 'O email é repetido';
        }
      }
   }

 }else if($_FILES['image']['size'] > 2097152 ||$_FILES['image']['size'] == 0 ){
    echo 'ERROR : File size error, it must be excately 2 MB';
 }
 include '../../../php/deconn.php';
?>
