<script>
$(document).ready(function(){
	$("#4521").hide();
  $(".edit").click(function(){
    $("#4520").hide();
    $("#4521").show();
  });

});
</script>
<div id="4520" class="container-fluid">
    <div class="row">
        <div class="card" style="height:420px;">
            <div class="header">
              <h4 class="title">Produtos</h4>
              <p class="category">Gerir Imagens</p>
              <div id="btscryp2" class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              </div>
            </div>
            <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped paginated2">
                  <thead>
                    <th></th>
                    <th>Categoria</th>
                    <th></th>
                  </thead>
                  <tbody style="border:2px solid #bfbfbf;">
										<?php
											require_once '../../../php/functions.php';
											session_start();
											  include '../../../php/conn.php';
										$id = $_POST['id'];
										$dado =mysqli_query($conn,"SELECT id_imagem, id_produto, id_imgcategoria, nome_imagem FROM imagem WHERE id_produto = $id");
										while ($rows = mysqli_fetch_assoc($dado)){
											$queryidcategoria = "SELECT id_imgcategoria, nome_imgcategoria FROM imgcategoria WHERE ".$rows['id_imgcategoria']." = id_imgcategoria";
											$cat = mysqli_fetch_assoc(mysqli_query($conn, $queryidcategoria));
											 ?>
												<tr>
													<td><img src="../<?php echo $rows['nome_imagem']; ?>" style="width:40px; height:60px;"></td>
	                        <td><?php echo $cat['nome_imgcategoria']; ?></td>
	                        <td>
	                          <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs edit" onclick="">
	                              <i class="fa fa-edit"></i>
	                          </button>
	                          <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="">
	                              <i class="fa fa-times"></i>
	                          </button>
	                        </td>
												</tr>
												<?php
											}include '../../../php/deconn.php';?>
                      <!-- <tr>
                        <td><img src="../../../images/uploads/img.png |!| ../00_Recources/final-4914.jpg" style="width:40px; height:60px;"></td>
                        <td>Dakota Rice</td>
                        <td>
                          <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs edit" onclick="">
                              <i class="fa fa-edit"></i>
                          </button>
                          <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="">
                              <i class="fa fa-times"></i>
                          </button>
                        </td>
                      </tr> -->
									</tbody>
              </table>
              <script>
                  $('table.paginated2').each(function() {
                      var currentPage = 0;
                      var numPerPage = 3;
                      var $table = $(this);
                      $table.bind('repaginate', function() {
                          $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
                      });
                      $table.trigger('repaginate');
                      var numRows = $table.find('tbody tr').length;
                      var numPages = Math.ceil(numRows / numPerPage);
                      var $pager = $('<div class="btn-group mr-2" role="group" aria-label="First group"></div>');
                      for (var page = 0; page < numPages; page++) {
                          $('<button type="button" class="btn btn-secondary" style="padding:2px 10px;"></button>').text(page + 1).bind('click', {
                              newPage: page
                          }, function(event) {
                              currentPage = event.data['newPage'];
                              $table.trigger('repaginate');
                              $(this).addClass('active').siblings().removeClass('active');
                          }).appendTo($pager).addClass('clickable');
                      }
                      $pager.appendTo("#btscryp2").find('class="btn btn-secondary":first').addClass('active');
                  });
              </script>
          </div>
      </div>
    </div>
  </div>


  <div id="4521" class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Produtos</h4>
                      <p id="btns" class="category">Adicionar Imagens</p>
                  </div>
                  <div class="content table-responsive table-full-width">
                    <form class="" method="post" style="padding: 20px;">
                      <div class="row">
                        <div  class="change" style=" border: 4px double #d9dbdd; width:400px; height:240px; position:relative;">
                          <img class="change" id="output"style="width:392px; height: 232px;"/>
                        </div>
                        <script>

                        //->Aumentar X da Imagem
                        $("#3210").click(function(){
                          $(".change").animate({
                            width: '+=10px'
                         });
                        });

                        $("#3211").click(function(){
                          $(".change").animate({
                            width: '-=10px'
                         });
                        });

                        $("#3212").click(function(){
                          $(".change").animate({
                            height: '+=10px'
                         });
                        });

                        $("#3213").click(function(){
                          $(".change").animate({
                            height: '-=10px'
                         });
                        });
                          var loadFile = function(event) {
                            var reader = new FileReader();
                            reader.onload = function(){
                              var output = document.getElementById('output');
                              output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                          };
                        </script>
                        <div class="col-md-5">
                          <input type="file" name="" accept="image/*" onchange="loadFile(event)">
                          <br>
                          <div id='btscryp' class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'>
                            <div class='btn-group mr-2' role='group' aria-label='First group'>
                              <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3210" >x +</button>
                              <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3211" >x -</button>
                              <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3212" >y +</button>
                              <button  class='btn btn-secondary' style='padding:2px 10px;' type="button" name="button" id="3213" >y -</button>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Categoria da Imagem</label>
                                <select class="form-control" name="categoria_img" style="position:relative; top:15px;">
                                  <option value="0">-- Select --</option>
                                  <!--
                                  $paises = mysqli_query($conn,"SELECT numero_pais, pais FROM pais ");
                                  while ($row=mysqli_fetch_assoc($paises)){
                                    echo '<option value="'.$row['numero_pais'].'">'.$row['pais'].'</option>';
                                  }
                                 -->
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="submeter" id="btn_sub"> Adicionar </button>
                        <script type="text/java">
                                    function enforce_maxlength(event) {
                                      var t = event.target;
                                      if (t.hasAttribute('maxlength')) {
                                      t.value = t.value.slice(0, t.getAttribute('maxlength'));
                                        }
                                      }
                                      document.body.addEventListener('input', enforce_maxlength);
                                </script>
                      </form>
                  </div>
                </div>
            </div>
      </div>
  </div>
    <!--
    <!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

.switch input {
opacity: 0;
width: 0;
height: 0;
}

.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}
</style>
<script>
$(document).ready(function(){
var switchStatus = false;
$(".togBtn").on('change', function() {
  if ($(this).is(':checked')) {
      switchStatus = $(this).is(':checked');
      alert(switchStatus);// To verify
  }
  else {
     switchStatus = $(this).is(':checked');
     alert(switchStatus);// To verify
  }
});
});
</script>
</head>
<body>

<h2>Toggle Switch</h2>

<label class="switch">
<input type="checkbox" class="togBtn" value="false" name="disableYXLogo">
<div class="slider round"></div>
</label>

<label class="switch">
<input type="checkbox" class="togBtn" value="false" name="disableYXLogo">
<div class="slider round"></div>
</label>
<label class="switch">
<input type="checkbox" class="togBtn" value="false" name="disableYXLogo">
<div class="slider round"></div>
</label> <label class="switch">
<input type="checkbox" class="togBtn" value="false" name="disableYXLogo">
<div class="slider round"></div>
</label>
</body>
</html>

    -->
