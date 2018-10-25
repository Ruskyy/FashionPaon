<?php
$user="root";
$pass="";
$servername="localhost";

//Estabelecer ligacao
$conn = mysqli_connect($servername, $user, $pass);
//Check Ligaçao
if(!$conn){
  die("Error:" . mysqli_connect_error());
}
mysqli_select_db($conn,"corkexpress");
mysqli_set_charset($conn,'utf8');
 ?>
