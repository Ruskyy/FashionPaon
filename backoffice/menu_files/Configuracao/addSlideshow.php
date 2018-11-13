<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  /*$slide_titulo = $_POST['slide_titulo'];
  $effect_titulo = $_POST['effect_titulo'];
  $anim_titulo = $_POST['anim_titulo'];
  $slide_desc = $_POST['slide_desc'];
  $anim_desc = $_POST['anim_desc'];
  $buton_status = $_POST['buton_status'];
  $button_text = $_POST['button_text'];
  $anim_button = $_POST['anim_button'];
  $button_link = $_POST['button_link'];*/

  if(@$_POST['buton_status'] != 'on'){
    $button_status = "off";
  }else{
    $button_status = "on";
  }


if($_FILES['slider_img']['size'] > 2097152 || $_FILES['slider_img']['size'] == 0 ){
      echo 'ERROR : File size error, it must be excately 2 MB';
   }
else if($_FILES['slider_img']['error'] == 0) {
   $file_name = $_FILES['slider_img']['name'];
   $file_size = $_FILES['slider_img']['size'];
   $file_tmp =$_FILES['slider_img']['tmp_name'];
   $file_type=$_FILES['slider_img']['type'];
   @$file_ext=strtolower(end(explode('.',$_FILES['slider_img']['name'])));
   $var = (string)$file_ext;

   $expensions= array("jpeg","jpg","png");
   if(in_array($file_ext,$expensions)== false){
      echo "Extension not allowed, please choose a JPEG or PNG file.";
   }else{
     $generatedname = generateRandomString(100).'.'.$file_ext;
     $img_path="images/slider/".$generatedname;
     //move_uploaded_file($file_tmp,"../../../images/slider/".$generatedname);

      mysqli_query($conn,"INSERT INTO slider(slide_state, image_slide, title_slide, title_effect, title_anim, desc_slide, desc_anim, button_slide, button_text, buton_anim, button_link)
      VALUES (0,'$img_path','$_POST[slide_titulo]','$_POST[effect_titulo]','$_POST[anim_titulo]','$_POST[slide_desc]','$_POST[anim_desc]','$button_status','$_POST[button_text]','$_POST[anim_button]','$_POST[button_link]')");
      echo "sucesso";
   }

}else if($_FILES['slider_img']['error'] == 1 || $_FILES['slider_img']['error'] == 4){
  echo 'Insira uma Imagem válida.';
}
 include '../../../php/deconn.php';
?>
