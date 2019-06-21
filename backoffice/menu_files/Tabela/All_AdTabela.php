show TABLES;

Tables_in_fashedot


SHOW COLUMNS FROM slider

Field 	Type          	   Null 	Key 	Default 	Extra
id_slide 	int(11)         	NO 	  PRI 	  NULL 	auto_increment
slide_state 	int(11)     	NO 	          NULL
image_slide 	varchar(150) 	NO 		        NULL
title_slide 	varchar(50) 	NO 	        	NULL
title_effect 	varchar(50) 	NO 		        NULL
title_anim 	varchar(50)    	NO 		        NULL
desc_slide 	varchar(150)  	NO 		        NULL
desc_anim 	varchar(50)   	NO 		        NULL
button_slide 	varchar(10) 	NO 	         	off
button_text 	varchar(50) 	NO 		        NULL
buton_anim 	varchar(50)   	NO 		        NULL
button_link 	varchar(150) 	NO 		        NULL

mysqli_num_rows(mysqli_query($conn,""));

Tables_in_fashedot
ad_encomendas
ad_notification
ad_tabelas
carrinho
carrinho_stock
categoria
cliente
desconto
imagem
imgcategoria
marca
marcas
mes
notify_content
paises
parallax
produto
publico
slider
slider_texteffects
stock
tamanho
<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $id = $_POST['id'];
  $tipo = $_POST['tipo'];

  if($tipo == 0){

  }else if ($tipo == 1) {

  }else if ($tipo == 2) {

  }else if($tipo == 3){

  }else if ($tipo == 4) {

  }
  include '../../../php/deconn.php';
 ?>
