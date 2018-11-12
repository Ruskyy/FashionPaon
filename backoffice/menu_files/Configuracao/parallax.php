
<div class="container-fluid">
  <div class="row">
      <div>
        <script>
          var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
              var output = document.getElementById("output");
              output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
          };
        </script>

          <div class="card" style="height:750px;">
              <div class="header">
                <h4 class="title">Configuracao > Parallax</h4>
                <hr>
              </div>

              <div class="content table-responsive table-full-width">

                <div class="col-md-6 form-group" style="margin-top:1%;">

                  <?php

                  include '../../../php/conn.php';
                  $query = "SELECT * FROM parallax where id = '1'";
                  $dados = mysqli_query($conn,$query);
                  while ($dado=mysqli_fetch_assoc($dados)) {
                    echo '
                    <form class="" method="post">

                    <div class="form-group">
                      <label for="slider_img">Imagem</label>
                      <input type="file" class="form-control-file" id="slider_img" name="slider_img" accept="image/*" onchange="loadFile(event)" required>
                    </div>
                    <div class="form-group">
                      <label for="slide_title">1ªLinha</label>
                      <input type="text" class="form-control" name="first_line" value="'.$dado['first_line'].'" placeholder="Linha superior (texto pequeno)" maxlength="35" required>
                    </div>

                    <div class="form-group">
                      <label for="slide_title">2ªLinha</label>
                      <input type="text" class="form-control" name="second_line" value="'.$dado['second_line'].'" placeholder="Linha inferior (texto de enfâse)" maxlength="35" required>
                    </div>

                    <div class="container" style="margin-bottom:2%;">
                    <div class="row">
                      <div class="col">
                          <label>Butão: </label>
                      </div>';
                      if ($dado['btn'] == 1) {
                        echo '
                        <script>

                        </script>';
                      }else {
                        echo '
                        <script>
                        
                        </script>';
                      }
                      echo '
                      <div class="col">
                        <label class="switch">
                          <input class="togBtn" name="buton_status" type="checkbox">
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>

                    <div id="buttoninfo">
                      <div class="form-group">
                        <label for="formGroupExampleInput">Texto Butão</label>
                        <input type="text" class="form-control" id="text_btn" placeholder="Example input">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Video Butão</label>
                        <input type="text" class="form-control" name="link_btn" placeholder="Another input">
                        <small id="emailHelp" class="form-text text-muted">O Link deve ser o embed to youtube</small>
                      </div>
                    </div>
                      <button type="submit" name="submeter_paralax" class="btn btn-primary">Alterar</button>
                      <button type="reset" name="submeter_slide" id="resetbtnus" class="btn btn-danger" onclick="hideOnReset()">Reset</button>
                  </form>
              </div>

                <div class="col-md-6 form-group" style="margin-top:1%;">
                  <center>
                    <iframe src="'.$dado['btn_video'].'" width="640" height="360" allowfullscreen></iframe>
                  </center>
                </div>
              </div>
          </div>
      </div>

      ';
    }
    ?>

      <script>
      $(document).ready(function(){
      $("#buttoninfo").hide();
      var switchStatus = false;
      $(".togBtn").on('change', function() {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            $("#buttoninfo").show();
        }
        else {
           switchStatus = $(this).is(':checked');
           $("#buttoninfo").hide();
        }
        });
      });
      </script>

      <script>
      function hideOnReset() {
        $("#buttoninfo").hide();
      }
      </script>
