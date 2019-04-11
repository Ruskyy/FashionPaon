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
mysqli_select_db($conn,"fashedot");
mysqli_set_charset($conn,'utf8');

/*
$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}

  mysqli_free_result($result);
    */
 ?>
