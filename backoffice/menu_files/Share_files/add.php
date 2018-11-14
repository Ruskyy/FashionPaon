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
  $img_path="images/unknown.png";

  $username=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_username FROM cliente WHERE cliente_username='$user'"));
  $emails=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_email FROM cliente WHERE cliente_email='$email'"));

  //Encripta a password
    $encpassword =md5($pass);

if($_FILES['image']['size'] == 0 && $_FILES['image']['error'] != 0) {
    //-> erro 1 arrebentou > 5mb
    //-> erro 4 n existe ficheiro
    //-> erro 0 sem erros < 5mb e existe ficheiro
    //echo "Error";
}if($_FILES['image']['name'] == "") {
  //  echo "Empty file";
}
if($_FILES['image']['error'] == 0) {
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   @$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
   $var = (string)$file_ext;

   $expensions= array("jpeg","jpg","png");
   if(in_array($file_ext,$expensions)== false){
      echo "Extension not allowed, please choose a JPEG or PNG file.";
   }else if($_FILES['image']['size'] > 2097152 || $_FILES['image']['size'] == 0 ){

   }
     else{
     $generatedname = generateRandomString(100).'.'.$file_ext;
     $img_path="images/uploads/".$generatedname;
      move_uploaded_file($file_tmp,"../../../images/uploads/".$generatedname);

      if(!$username && !$emails){
        if($pass == $confpass){
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

}else if($_FILES['image']['error'] == 1 || $_FILES['image']['error'] == 4){
  if(!$username && !$emails){
    if($pass == $confpass){
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
  /*if($_FILES['image']['error'] == 1){
    echo 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
  }if($_FILES['image']['error'] == 4){
    echo 'No file was uploaded.';
  }*/
}else if($_FILES['image']['size'] > 2097152 || $_FILES['image']['size'] == 0 ){
    echo 'ERROR : File size error, it must be excately 2 MB';
 }
 include '../../../php/deconn.php';


 /*
 UPLOAD_ERR_OK
     Value: 0; There is no error, the file uploaded with success.

 UPLOAD_ERR_INI_SIZE
     Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.

 UPLOAD_ERR_FORM_SIZE
     Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.

 UPLOAD_ERR_PARTIAL
     Value: 3; The uploaded file was only partially uploaded.

 UPLOAD_ERR_NO_FILE
     Value: 4; No file was uploaded.

 UPLOAD_ERR_NO_TMP_DIR
     Value: 6; Missing a temporary folder. Introduced in PHP 5.0.3.

 UPLOAD_ERR_CANT_WRITE
     Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.

 UPLOAD_ERR_EXTENSION
     Value: 8; A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0.
 */
?>
