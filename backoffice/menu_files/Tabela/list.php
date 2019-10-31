<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';


?>
<style type="text/css">
  .tabela_tr{
    border: 3px bisque solid;
    background-color:transparent !important;
  }
  .tabela_tr:hover{
    background-color: #f9f9f9 !important;
    cursor: pointer;
  }
  .campos_tr{
    background-color:#f9f9f9 !important;
  }
  .campos_tr:hover{
    background-color: transparent !important;
  }


/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 88%;
}

/* The Close Button */
.close {
  color: #4d4d4d;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="header">
                  <h4 class="title">Striped Table with Hover</h4>
                  <p id="btns" class="category">Here is a subtitle for this table</p>
                  <p>
                    <button type="button" rel="tooltip" title="open" class="btn btn-success btn-simple btn-xs" onclick="OpenAllTabs()">
                      <i class="fa fa-cube"></i> Open Tabs
                    </button>
                    <button type="button" rel="tooltip" title="close" class="btn btn-danger btn-simple btn-xs" onclick="CloseAllTabs()">
                      <i class="fa fa-cube"></i> Close Tabs
                    </button>
                </p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead>
                          <th>Tabelas</th>
                          <th>Nº de Colunas</th>
                          <th>Field</th>
                          <th>Type</th>
                          <th>Null</th>
                          <th>Key</th>
                          <th>Default</th>
                          <th>Extra</th>
                        </thead>
                        <tbody id = "contentData">
                          <?php
                          $dado = mysqli_query($conn,"Show TABLES");
                          while ($rows = mysqli_fetch_assoc($dado)){
                            $dados = mysqli_query($conn,"SHOW COLUMNS FROM ".$rows['Tables_in_fashedot']);
                            $how_many = mysqli_num_rows($dados);
                            $marks =
                                array(
                                    "tabela"    => "TB_".$rows['Tables_in_fashedot'],
                                    "subtabela" => "SUB-TB_".$rows['Tables_in_fashedot'],
                                );
                            $script[] = $marks;?>
                            <tr id="<?php  echo "TB_".$rows['Tables_in_fashedot'];?>" class="tabela_tr" onclick="tab('<?php  echo "TB_".$rows['Tables_in_fashedot'];?>')">
                              <td><?php  echo $rows['Tables_in_fashedot'];?></td>
                              <td><?php  echo $how_many;?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <button type="button" rel="tooltip" title="Valores" class="btn btn-info btn-simple btn-xs" onclick="ShowTabelContent('<?php echo $rows['Tables_in_fashedot'];?>', 0)">
                                    <i class="fa fa-cubes"></i>
                                </button>
                              </td>
                            </tr><?php
                              while ($rowss = mysqli_fetch_assoc($dados)){
                                ?><tr class="campos_tr <?php echo "SUB-TB_".$rows['Tables_in_fashedot'];?>">
                                  <td></td>
                                  <td></td>
                                  <td><?php  echo $rowss['Field'];?></td>
                                  <td><?php  echo $rowss['Type'];?></td>
                                  <td><?php  echo $rowss['Null'];?></td>
                                  <td><?php  echo $rowss['Key'];?></td>
                                  <?php
                                  if($rowss['Default'] != null){?>
                                    <td><?php  echo $rowss['Default'];?></td><?php
                                  }else {?>
                                    <td><?php  echo "Null";?></td><?php
                                  }?>
                                  <td><?php  echo $rowss['Extra'];?></td></tr><?php
                              }
                          }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="col-md-6" >
            <div id="sub_menu_aqui">

            </div>
          </div>
        </div>
      </div>
      <script>
        var obj = {};
        var obj2 = <?php echo json_encode($script);?>;
        <?php
        foreach ($script as $key) {?>
          obj['<?php echo $key['tabela']; ?>'] = false;
          console.log(obj['<?php echo $key['tabela']; ?>']);<?php
        }?>
        for (var i = 0; i < obj2.length; i++) {
          if(obj[obj2[i]['tabela']] == false){
            $("."+obj2[i]['subtabela']).css("display","none");
          }
        }

      function CloseAllTabs(){
        for (var i = 0; i < obj2.length; i++) {
            $("."+obj2[i]['subtabela']).css("display","none");
            obj[obj2[i]['tabela']]  = false;
        }
      }

      function OpenAllTabs(){
        for (var i = 0; i < obj2.length; i++) {
            $("."+obj2[i]['subtabela']).css("display","");
            obj[obj2[i]['tabela']]  = true;
        }
      }

      function tab(x){
        console.log("|:--> "+x);
        for (var i = 0; i < obj2.length; i++) {
          if (x == obj2[i]['tabela']) {
            console.log("||:--> "+obj2[i]['tabela']);
            console.log("|||:--> "+obj[x]);
            if(obj[x] == false){
              $("."+obj2[i]['subtabela']).css("display","");
              obj[x] = true;
            }else {
              $("."+obj2[i]['subtabela']).css("display","none");
              obj[x] = false;
            }
          }
        }
      }

      function CloseModal(){
        $('#sub_menu_aqui').empty();
      }

      window.onclick = function(event) {
        if (event.target.className == "modal") {
          $('#sub_menu_aqui').empty();
        }
      }
    </script>
