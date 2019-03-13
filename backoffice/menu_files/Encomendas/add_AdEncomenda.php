<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];
  ?>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-4">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Striped Table with Hover</h4>
                      <p id="btns" class="category">Here is a subtitle for this table</p>
                  </div>


              </div>
          </div>
        </div>
    </div>

<<?php include '../../../php/deconn.php'; ?>
