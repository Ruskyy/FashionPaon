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
                          <th>Produto</th>
                          <th>Tamanho</th>
                          <th>Quantidade</th>
                          <th>Preço</th>
                          <th>Começou</th>
                          <th>Acaba</th>
                          <th></th>
                          <th></th>
                        </thead>
                        <tbody id = "contentData">

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
      $(document).ready(function(){
        ReceveData();
      		function ReceveData(){
      			$.ajax({
      					url:"menu_files/Encomendas/config_page.php",
      					method:"POST",
      					success:function(data){
      						$('#contentData').html(data);
      					}
      			});
      		}
      		setInterval(ReceveData, 1000);
      });
      </script>
