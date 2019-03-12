<?php
require_once '../../../php/functions.php';
include '../../../php/conn.php';
$id = $_POST['id'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];


/*@NOTE
  0-- +
  1-- -
*/
if($tipo == 0){
    mysqli_query($conn, "UPDATE stock
       SET stock_quantidade = stock_quantidade + '$quantidade'
        WHERE stock_id ='$id'");
}
else if($tipo == 1){
    mysqli_query($conn, "UPDATE stock
       SET stock_quantidade = stock_quantidade - '$quantidade'
        WHERE stock_id ='$id'");
}
include '../../../php/deconn.php';
?>
