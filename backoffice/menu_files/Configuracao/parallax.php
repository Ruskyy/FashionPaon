
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
                  <form class="" method="post">

                  <div class="form-group">
                    <label for="slider_img">Imagem</label>
                    <input type="file" class="form-control-file" id="slider_img" name="slider_img" accept="image/*" onchange="loadFile(event)" required>
                  </div>
                  <div class="form-group">
                    <label for="slide_title">Titulo</label>
                    <input type="text" class="form-control" name="slide_titulo"  placeholder="Titulo a apresentar em cima do paralalx" maxlength="35" required>
                  </div>

                  <div class="container" style="margin-bottom:2%;">
                  <div class="row">
                    <div class="col">
                        <label>Butão: </label>
                    </div>
                    <div class="col">
                      <label class="switch">
                        <input class="togBtn" name="buton_status" type="checkbox">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                </div>

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

                    <script>
                    function hideOnReset() {
                      $("#buttoninfo").hide();
                    }
                    </script>
                </form>
              </div>

                <div class="col-md-6 form-group" style="margin-top:1%;">
                  <center>
                    <iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" width="640" height="360" allowfullscreen></iframe>
                  </center>
                </div>
              </div>
          </div>
      </div>
