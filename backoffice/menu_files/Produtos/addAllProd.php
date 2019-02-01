<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

  $id = $_POST['id'];
  $tipo = $_POST['tipo'];

  //$id = $_POST['idd'];
  //$tipo = $_POST['tipoo'];
  //0-Delete, 1- add do produto, 2-Edit do produto, 3-add imagens, 4- add de stock
  if($tipo == 1){
    mysqli_query($conn,"DELETE FROM imagem WHERE id_produto = '$id'");
    mysqli_query($conn,"DELETE FROM stock WHERE stock_idproduto = '$id'");
    mysqli_query($conn,"DELETE FROM produto WHERE produto = '$id'");
    echo 'sucesso';
  }if($tipo == 2){
    $nome_produto = $_POST['nome_produto'];
    $categoria_produto = $_POST['categoria_produto'];
    $categoria_publico = $_POST['categoria_publico'];
    $descricao_produto = $_POST['descricao_produto'];
    //produto_id, produto_idcategoria,	produto_nome,	produto_idmarca,	produto_desc,	id_publico
    mysqli_query($conn, "UPDATE produto SET produto_nome = '$nome_produto', produto_idcategoria = '$categoria_produto', produto_desc = '$descricao_produto', id_publico = '$categoria_publico'  WHERE produto_id = '$id'");
    echo 'sucesso';
  }if($tipo == 3){
      $categoria_img = $_POST['categoria_img'];

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
          echo 'ERROR : File size error, it must be excately 2 MB';
       }else if($categoria_img == 0){
          echo 'Selecione outra opção';
       }else{
         $generatedname = generateRandomString(100).'.'.$file_ext;
         $img_path="images/uploads/".$generatedname;
          move_uploaded_file($file_tmp,"../../../images/uploads/".$generatedname);

          mysqli_query($conn,"INSERT INTO imagem(id_produto, id_imgcategoria, nome_imagem )
          VALUES ('$id','$categoria_img','$img_path')");
          echo 'sucesso';
       }

    }
      if($_FILES['image']['error'] == 1){
        echo 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
      }if($_FILES['image']['error'] == 4){
        echo 'No file was uploaded.';
      }
      else if($_FILES['image']['size'] > 2097152 || $_FILES['image']['size'] == 0 ){
        echo 'ERROR : File size error, it must be excately 2 MB';
     }

  }if($tipo == 4){
    $s_quantidade = 0;
    $s_prodtamanho = $_POST['categoria_stock'];
    $s_prodpreco = $_POST['preco'];
    mysqli_query($conn,"INSERT INTO stock(stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco)
    VALUES ('$id', '$s_quantidade', '$s_prodtamanho', '$s_prodpreco')");
    echo 'sucesso';
  }



  include '../../../php/deconn.php';
  ?>
