
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
                <h4 class="title">Configuração > Parallax</h4>
                <hr>
              </div>
              <div class="content table-responsive table-full-width">


              </div>
          </div>
      </div>
