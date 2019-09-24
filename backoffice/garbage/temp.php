<?php// random shift




if($dadossss){
  $dadossss1 = mysqli_fetch_assoc(
    mysqli_query($conn,
      "SELECT ad_tabelas_id, ad_tabelas_nome, ad_tabelas_num
        FROM ad_tabelas WHERE ad_tabelas_num = "));
    $test = "".$rows['ad_notification_content'];
    $test = str_replace("[&nome&]",$dadossss['produto_nome'] ,$test);
  if($dadossss1['ad_tabelas_nome'] == 'produto'){

  }else if($dadossss1['ad_tabelas_nome'] == 'marca'){
    $dadossss2 = mysqli_fetch_assoc(
      mysqli_query($conn,
        "SELECT id_marca, prod_marca_id, prod_id
          FROM marca Inner Join marcas ON prod_marca_id = id_marca WHERE prod_id = "));
    $test = str_replace("[&marca&]",$dadossss2['nome_marca'] ,$test);
  }else if($dadossss1['ad_tabelas_nome'] == 'stock'){

    $dadossss2 = mysqli_fetch_assoc(
      mysqli_query($conn,
        "SELECT *
          FROM stock Inner join tamanho ON stock_prodtamanho = id_tamanho WHERE  stock_id = "));
    $test = str_replace("[&stock&]",$dadossss2['nome_tamanho'] ,$test);
  }else if($dadossss1['ad_tabelas_nome'] == 'imagem'){

    $dadossss2 = mysqli_fetch_assoc(
      mysqli_query($conn,
        "SELECT *
          FROM imagem Inner join imgcategoria ON imagem.id_imgcategoria = imgcategoria.id_imgcategoria WHERE id_imagem = "));
    $test = str_replace("[&categoria&]",$dadossss2['imgcategoria.nome_imgcategoria'] ,$test);
  }
  ?>
    <script> demo.showNotification('top','right', '<?php echo "".$test; ?>') </script>
  <?php
}




 ?>
