
<!-- show TABLES;

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
tamanho -->
<?php
  require_once '../../../php/functions.php';
  include '../../../php/conn.php';
  $Tabela = $_POST['tb'];
  $DataCol = mysqli_query($conn,"SHOW COLUMNS FROM ".$Tabela);
  $Cols = "";
  $Theads = array();
  $i = 0; //THEADS
  $ii = 0; //
  $row = array();
  $row['pags'] = $_POST['pg']; // 0
  $row['begin'] = $row['pags']  * 12;  //0
  $row['end'] = (($row['pags'] + 1)  * 12) - 1;  //11
  $row['before'] = $row['pags'] - 1; //-1
  $row['next'] = $row['pags'] + 1;  //1

  while ($rows = mysqli_fetch_assoc($DataCol)){
    if($i != 0){
      $Cols = $Cols.", ";
    }
    $Cols = "".$Cols.$rows['Field'];
    $Theads[] = $rows['Field'];
    $i++;
  }
  ?>

  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span onclick="CloseModal()" class="close" >&times;</span>
      <br><br>
      <div style="width: 95%; margin: auto; padding: 20px; border: 3px bisque solid; background-color:transparent !important;">
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped" id="myTable">
                <thead style="text-align-last: center;">
                  <?php foreach ($Theads as $value){ ?>
                    <th><?php echo $value; ?></th>
                  <?php } ?>
                </thead>
                <tbody>
                  <?php $dados = mysqli_query($conn,"SELECT ".$Cols." FROM ".$Tabela);
                   $row['rows'] = mysqli_num_rows($dados);
                    while ($rowss = mysqli_fetch_assoc($dados)){?>
                    <?php
                      if($ii == $row['begin']){?>
                        <tr class="campos_tr" style="text-align: center;"><?php
                          foreach ($Theads as $value){ ?>
                            <td><?php
                              echo $rowss[$value]; ?>
                            </td><?php
                            } ?>
                        </tr>  <?php
                        if($row['begin'] == $row['end']){
                          break;
                        }
                        $row['begin']++;
                      }
                      $ii++;
                    }?>
                </tbody>
            </table>
          </div>
        </div>
        <div style="height: 40px;">
          <div style="float: right;">
            <button class="btn btn-simple " style="font-size: 30px; color: #1d6fea;" <?php
              if($row['pags'] != 0){?>
                onclick="ShowTabelContent('<?php echo $Tabela;?>', <?php echo $row['before'];?>)"<?php
              }else{?>
                disabled<?php
              } ?>
              > <i class="pe-7s-up-arrow"></i>
            </button>
            <button class="btn btn-simple " style="font-size: 30px; color: #1d6fea;" <?php
              if($row['end'] < $row['rows']){?>
                  onclick="ShowTabelContent('<?php echo $Tabela;?>', <?php echo $row['next'];?>)"<?php
              }else{?>
                disabled<?php
              }?>
              > <i class="pe-7s-bottom-arrow"></i>
            </button>
        </div>
      </div>
    </div><?php
  include '../../../php/deconn.php';
 ?>
