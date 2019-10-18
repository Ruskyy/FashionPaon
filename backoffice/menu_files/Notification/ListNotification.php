<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';

$dados = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT ad_notification_id, ad_notification_content, ad_notification_tipo, ad_notification_estado, ad_notification_tabela, ad_notification_idtabela
      FROM ad_notification "));



?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="header">
                    <h4 class="title">Striped Table with Hover</h4>
                    <p id="btns" class="category">Here is a subtitle for this table</p>
                    <p>
                      <button type="button" rel="tooltip" title="Entregado" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-cube"></i> Entregado
                      </button>

                      <button type="button" rel="tooltip" title="Processar" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-cube"></i> Processar
                      </button>
                  </p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                          <th></th>
                          <th></th>
                          <th></th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
          </div>

        </div>
      </div>
