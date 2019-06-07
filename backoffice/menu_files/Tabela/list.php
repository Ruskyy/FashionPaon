<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';


?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="header">
                  <h4 class="title">Striped Table with Hover</h4>
                  <p id="btns" class="category">Here is a subtitle for this table</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead>
                          <th>Tabelas</th>
                          <th>Nº de Colunas</th>
                          <th>Colunas</th>
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
                            $how_many = mysqli_num_rows($dados);?>
                            <tr>
                              <td><?php  echo $rows['Tables_in_fashedot'];?></td>
                              <td><?php  echo $how_many;?></td>
                            </tr><?php
                              while ($rowss = mysqli_fetch_assoc($dados)){
                                ?></tr>
                                  <td></td>
                                  <td></td>
                                  <td><?php  echo $rowss['Field'];?></td>
                                  <td><?php  echo $rowss['Type'];?></td>
                                  <td><?php  echo $rowss['Null'];?></td>
                                  <td><?php  echo $rowss['Key'];?></td>
                                  <td><?php  echo $rowss['Default'];?></td>
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
