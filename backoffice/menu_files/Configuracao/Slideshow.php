
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
          <div class="card" style="height:1500px;">
              <div class="header">
                <h4 class="title">SlideShow</h4>
                <hr>
              </div>
              <div class="content table-responsive table-full-width">

                <img src="../images/slide-example.jpg" id="output" width="100%" height="400px">

                <div class="col-md-6 form-group" style="margin-top:1%;">
                  <h4 class="title">Adicionar Slide</h4>
                  <hr>
                  <form class="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="slider_img">Imagem</label>
                      <input type="file" class="form-control-file" id="slider_img" name="slider_img" accept="image/*" onchange="loadFile(event)" required>
                    </div>
                    <div class="form-group">
                      <label for="slide_title">Titulo</label>
                      <input type="text" class="form-control" name="slide_titulo"  placeholder="Titulos a apresentar em cima da imagem" maxlength="35" required>
                    </div>
                    <div class="form-group">
                    <label for="anim_titulo"> Animação Titulo</label>
                    <select class="form-control" name="anim_titulo" required>
                            <optgroup label="Attention Seekers">
                              <option value="bounce">bounce</option>
                              <option value="flash">flash</option>
                              <option value="pulse">pulse</option>
                              <option value="rubberBand">rubberBand</option>
                              <option value="shake">shake</option>
                              <option value="swing">swing</option>
                              <option value="tada">tada</option>
                              <option value="wobble">wobble</option>
                              <option value="jello">jello</option>
                            </optgroup>

                            <optgroup label="Bouncing Entrances">
                              <option value="bounceIn">bounceIn</option>
                              <option value="bounceInDown">bounceInDown</option>
                              <option value="bounceInLeft">bounceInLeft</option>
                              <option value="bounceInRight">bounceInRight</option>
                              <option value="bounceInUp">bounceInUp</option>
                            </optgroup>

                            <optgroup label="Bouncing Exits">
                              <option value="bounceOut">bounceOut</option>
                              <option value="bounceOutDown">bounceOutDown</option>
                              <option value="bounceOutLeft">bounceOutLeft</option>
                              <option value="bounceOutRight">bounceOutRight</option>
                              <option value="bounceOutUp">bounceOutUp</option>
                            </optgroup>

                            <optgroup label="Fading Entrances">
                              <option value="fadeIn">fadeIn</option>
                              <option value="fadeInDown">fadeInDown</option>
                              <option value="fadeInDownBig">fadeInDownBig</option>
                              <option value="fadeInLeft">fadeInLeft</option>
                              <option value="fadeInLeftBig">fadeInLeftBig</option>
                              <option value="fadeInRight">fadeInRight</option>
                              <option value="fadeInRightBig">fadeInRightBig</option>
                              <option value="fadeInUp">fadeInUp</option>
                              <option value="fadeInUpBig">fadeInUpBig</option>
                            </optgroup>

                            <optgroup label="Fading Exits">
                              <option value="fadeOut">fadeOut</option>
                              <option value="fadeOutDown">fadeOutDown</option>
                              <option value="fadeOutDownBig">fadeOutDownBig</option>
                              <option value="fadeOutLeft">fadeOutLeft</option>
                              <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                              <option value="fadeOutRight">fadeOutRight</option>
                              <option value="fadeOutRightBig">fadeOutRightBig</option>
                              <option value="fadeOutUp">fadeOutUp</option>
                              <option value="fadeOutUpBig">fadeOutUpBig</option>
                            </optgroup>

                            <optgroup label="Flippers">
                              <option value="flip">flip</option>
                              <option value="flipInX">flipInX</option>
                              <option value="flipInY">flipInY</option>
                              <option value="flipOutX">flipOutX</option>
                              <option value="flipOutY">flipOutY</option>
                            </optgroup>

                            <optgroup label="Lightspeed">
                              <option value="lightSpeedIn">lightSpeedIn</option>
                              <option value="lightSpeedOut">lightSpeedOut</option>
                            </optgroup>

                            <optgroup label="Rotating Entrances">
                              <option value="rotateIn">rotateIn</option>
                              <option value="rotateInDownLeft">rotateInDownLeft</option>
                              <option value="rotateInDownRight">rotateInDownRight</option>
                              <option value="rotateInUpLeft">rotateInUpLeft</option>
                              <option value="rotateInUpRight">rotateInUpRight</option>
                            </optgroup>

                            <optgroup label="Rotating Exits">
                              <option value="rotateOut">rotateOut</option>
                              <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                              <option value="rotateOutDownRight">rotateOutDownRight</option>
                              <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                              <option value="rotateOutUpRight">rotateOutUpRight</option>
                            </optgroup>

                            <optgroup label="Sliding Entrances">
                              <option value="slideInUp">slideInUp</option>
                              <option value="slideInDown">slideInDown</option>
                              <option value="slideInLeft">slideInLeft</option>
                              <option value="slideInRight">slideInRight</option>

                            </optgroup>
                            <optgroup label="Sliding Exits">
                              <option value="slideOutUp">slideOutUp</option>
                              <option value="slideOutDown">slideOutDown</option>
                              <option value="slideOutLeft">slideOutLeft</option>
                              <option value="slideOutRight">slideOutRight</option>

                            </optgroup>

                            <optgroup label="Zoom Entrances">
                              <option value="zoomIn">zoomIn</option>
                              <option value="zoomInDown">zoomInDown</option>
                              <option value="zoomInLeft">zoomInLeft</option>
                              <option value="zoomInRight">zoomInRight</option>
                              <option value="zoomInUp">zoomInUp</option>
                            </optgroup>

                            <optgroup label="Zoom Exits">
                              <option value="zoomOut">zoomOut</option>
                              <option value="zoomOutDown">zoomOutDown</option>
                              <option value="zoomOutLeft">zoomOutLeft</option>
                              <option value="zoomOutRight">zoomOutRight</option>
                              <option value="zoomOutUp">zoomOutUp</option>
                            </optgroup>

                            <optgroup label="Specials">
                              <option value="hinge">hinge</option>
                              <option value="jackInTheBox">jackInTheBox</option>
                              <option value="rollIn">rollIn</option>
                              <option value="rollOut">rollOut</option>
                            </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="anim_titulo"> Efeito Titulo</label>
                    <select class="form-control" name="effect_titulo" required>
                      <!-- <option value="0">None</option> -->
                      <?php
                      include '../../../php/conn.php';
                      $queryeffects = "SELECT code_texteffect, desc_texteffect FROM slider_texteffects";
                      $efects = mysqli_query($conn,$queryeffects);
                      while ($efect=mysqli_fetch_assoc($efects)) {
                        echo '<option value="'.$efect['code_texteffect'].'">'.$efect['desc_texteffect'].'</option>';
                      } ?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="desc">Descrição</label>
                      <input type="text" class="form-control" name="slide_desc"  maxlength="35" placeholder="Desc.">
                    </div>
                    <div class="form-group">
                      <label for="anim_titulo"> Animação Descrição</label>
                    <select class="form-control" name="anim_desc">
                              <optgroup label="Attention Seekers">
                                <option value="bounce">bounce</option>
                                <option value="flash">flash</option>
                                <option value="pulse">pulse</option>
                                <option value="rubberBand">rubberBand</option>
                                <option value="shake">shake</option>
                                <option value="swing">swing</option>
                                <option value="tada">tada</option>
                                <option value="wobble">wobble</option>
                                <option value="jello">jello</option>
                              </optgroup>

                              <optgroup label="Bouncing Entrances">
                                <option value="bounceIn">bounceIn</option>
                                <option value="bounceInDown">bounceInDown</option>
                                <option value="bounceInLeft">bounceInLeft</option>
                                <option value="bounceInRight">bounceInRight</option>
                                <option value="bounceInUp">bounceInUp</option>
                              </optgroup>

                              <optgroup label="Bouncing Exits">
                                <option value="bounceOut">bounceOut</option>
                                <option value="bounceOutDown">bounceOutDown</option>
                                <option value="bounceOutLeft">bounceOutLeft</option>
                                <option value="bounceOutRight">bounceOutRight</option>
                                <option value="bounceOutUp">bounceOutUp</option>
                              </optgroup>

                              <optgroup label="Fading Entrances">
                                <option value="fadeIn">fadeIn</option>
                                <option value="fadeInDown">fadeInDown</option>
                                <option value="fadeInDownBig">fadeInDownBig</option>
                                <option value="fadeInLeft">fadeInLeft</option>
                                <option value="fadeInLeftBig">fadeInLeftBig</option>
                                <option value="fadeInRight">fadeInRight</option>
                                <option value="fadeInRightBig">fadeInRightBig</option>
                                <option value="fadeInUp">fadeInUp</option>
                                <option value="fadeInUpBig">fadeInUpBig</option>
                              </optgroup>

                              <optgroup label="Fading Exits">
                                <option value="fadeOut">fadeOut</option>
                                <option value="fadeOutDown">fadeOutDown</option>
                                <option value="fadeOutDownBig">fadeOutDownBig</option>
                                <option value="fadeOutLeft">fadeOutLeft</option>
                                <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                <option value="fadeOutRight">fadeOutRight</option>
                                <option value="fadeOutRightBig">fadeOutRightBig</option>
                                <option value="fadeOutUp">fadeOutUp</option>
                                <option value="fadeOutUpBig">fadeOutUpBig</option>
                              </optgroup>

                              <optgroup label="Flippers">
                                <option value="flip">flip</option>
                                <option value="flipInX">flipInX</option>
                                <option value="flipInY">flipInY</option>
                                <option value="flipOutX">flipOutX</option>
                                <option value="flipOutY">flipOutY</option>
                              </optgroup>

                              <optgroup label="Lightspeed">
                                <option value="lightSpeedIn">lightSpeedIn</option>
                                <option value="lightSpeedOut">lightSpeedOut</option>
                              </optgroup>

                              <optgroup label="Rotating Entrances">
                                <option value="rotateIn">rotateIn</option>
                                <option value="rotateInDownLeft">rotateInDownLeft</option>
                                <option value="rotateInDownRight">rotateInDownRight</option>
                                <option value="rotateInUpLeft">rotateInUpLeft</option>
                                <option value="rotateInUpRight">rotateInUpRight</option>
                              </optgroup>

                              <optgroup label="Rotating Exits">
                                <option value="rotateOut">rotateOut</option>
                                <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                                <option value="rotateOutDownRight">rotateOutDownRight</option>
                                <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                                <option value="rotateOutUpRight">rotateOutUpRight</option>
                              </optgroup>

                              <optgroup label="Sliding Entrances">
                                <option value="slideInUp">slideInUp</option>
                                <option value="slideInDown">slideInDown</option>
                                <option value="slideInLeft">slideInLeft</option>
                                <option value="slideInRight">slideInRight</option>

                              </optgroup>
                              <optgroup label="Sliding Exits">
                                <option value="slideOutUp">slideOutUp</option>
                                <option value="slideOutDown">slideOutDown</option>
                                <option value="slideOutLeft">slideOutLeft</option>
                                <option value="slideOutRight">slideOutRight</option>

                              </optgroup>

                              <optgroup label="Zoom Entrances">
                                <option value="zoomIn">zoomIn</option>
                                <option value="zoomInDown">zoomInDown</option>
                                <option value="zoomInLeft">zoomInLeft</option>
                                <option value="zoomInRight">zoomInRight</option>
                                <option value="zoomInUp">zoomInUp</option>
                              </optgroup>

                              <optgroup label="Zoom Exits">
                                <option value="zoomOut">zoomOut</option>
                                <option value="zoomOutDown">zoomOutDown</option>
                                <option value="zoomOutLeft">zoomOutLeft</option>
                                <option value="zoomOutRight">zoomOutRight</option>
                                <option value="zoomOutUp">zoomOutUp</option>
                              </optgroup>

                              <optgroup label="Specials">
                                <option value="hinge">hinge</option>
                                <option value="jackInTheBox">jackInTheBox</option>
                                <option value="rollIn">rollIn</option>
                                <option value="rollOut">rollOut</option>
                              </optgroup>
                        </select>
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
                        <label for="slide_title">Texto Butão</label>
                        <input type="text" class="form-control" name="button_text"  placeholder="Ex:. Saber Mais">
                      </div>

                      <div class="form-group">
                        <label for="slide_title">Link Butão</label>
                        <input type="text" class="form-control" name="button_link"  placeholder="Caso nada preencher com #">
                      </div>

                      <div class="form-group">
                        <label for="anim_titulo"> Animação Butão</label>
                        <select class="form-control" name="anim_button">
                                <optgroup label="Attention Seekers">
                                  <option value="bounce">bounce</option>
                                  <option value="flash">flash</option>
                                  <option value="pulse">pulse</option>
                                  <option value="rubberBand">rubberBand</option>
                                  <option value="shake">shake</option>
                                  <option value="swing">swing</option>
                                  <option value="tada">tada</option>
                                  <option value="wobble">wobble</option>
                                  <option value="jello">jello</option>
                                </optgroup>

                                <optgroup label="Bouncing Entrances">
                                  <option value="bounceIn">bounceIn</option>
                                  <option value="bounceInDown">bounceInDown</option>
                                  <option value="bounceInLeft">bounceInLeft</option>
                                  <option value="bounceInRight">bounceInRight</option>
                                  <option value="bounceInUp">bounceInUp</option>
                                </optgroup>

                                <optgroup label="Bouncing Exits">
                                  <option value="bounceOut">bounceOut</option>
                                  <option value="bounceOutDown">bounceOutDown</option>
                                  <option value="bounceOutLeft">bounceOutLeft</option>
                                  <option value="bounceOutRight">bounceOutRight</option>
                                  <option value="bounceOutUp">bounceOutUp</option>
                                </optgroup>

                                <optgroup label="Fading Entrances">
                                  <option value="fadeIn">fadeIn</option>
                                  <option value="fadeInDown">fadeInDown</option>
                                  <option value="fadeInDownBig">fadeInDownBig</option>
                                  <option value="fadeInLeft">fadeInLeft</option>
                                  <option value="fadeInLeftBig">fadeInLeftBig</option>
                                  <option value="fadeInRight">fadeInRight</option>
                                  <option value="fadeInRightBig">fadeInRightBig</option>
                                  <option value="fadeInUp">fadeInUp</option>
                                  <option value="fadeInUpBig">fadeInUpBig</option>
                                </optgroup>

                                <optgroup label="Fading Exits">
                                  <option value="fadeOut">fadeOut</option>
                                  <option value="fadeOutDown">fadeOutDown</option>
                                  <option value="fadeOutDownBig">fadeOutDownBig</option>
                                  <option value="fadeOutLeft">fadeOutLeft</option>
                                  <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                  <option value="fadeOutRight">fadeOutRight</option>
                                  <option value="fadeOutRightBig">fadeOutRightBig</option>
                                  <option value="fadeOutUp">fadeOutUp</option>
                                  <option value="fadeOutUpBig">fadeOutUpBig</option>
                                </optgroup>

                                <optgroup label="Flippers">
                                  <option value="flip">flip</option>
                                  <option value="flipInX">flipInX</option>
                                  <option value="flipInY">flipInY</option>
                                  <option value="flipOutX">flipOutX</option>
                                  <option value="flipOutY">flipOutY</option>
                                </optgroup>

                                <optgroup label="Lightspeed">
                                  <option value="lightSpeedIn">lightSpeedIn</option>
                                  <option value="lightSpeedOut">lightSpeedOut</option>
                                </optgroup>

                                <optgroup label="Rotating Entrances">
                                  <option value="rotateIn">rotateIn</option>
                                  <option value="rotateInDownLeft">rotateInDownLeft</option>
                                  <option value="rotateInDownRight">rotateInDownRight</option>
                                  <option value="rotateInUpLeft">rotateInUpLeft</option>
                                  <option value="rotateInUpRight">rotateInUpRight</option>
                                </optgroup>

                                <optgroup label="Rotating Exits">
                                  <option value="rotateOut">rotateOut</option>
                                  <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                                  <option value="rotateOutDownRight">rotateOutDownRight</option>
                                  <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                                  <option value="rotateOutUpRight">rotateOutUpRight</option>
                                </optgroup>

                                <optgroup label="Sliding Entrances">
                                  <option value="slideInUp">slideInUp</option>
                                  <option value="slideInDown">slideInDown</option>
                                  <option value="slideInLeft">slideInLeft</option>
                                  <option value="slideInRight">slideInRight</option>

                                </optgroup>
                                <optgroup label="Sliding Exits">
                                  <option value="slideOutUp">slideOutUp</option>
                                  <option value="slideOutDown">slideOutDown</option>
                                  <option value="slideOutLeft">slideOutLeft</option>
                                  <option value="slideOutRight">slideOutRight</option>

                                </optgroup>

                                <optgroup label="Zoom Entrances">
                                  <option value="zoomIn">zoomIn</option>
                                  <option value="zoomInDown">zoomInDown</option>
                                  <option value="zoomInLeft">zoomInLeft</option>
                                  <option value="zoomInRight">zoomInRight</option>
                                  <option value="zoomInUp">zoomInUp</option>
                                </optgroup>

                                <optgroup label="Zoom Exits">
                                  <option value="zoomOut">zoomOut</option>
                                  <option value="zoomOutDown">zoomOutDown</option>
                                  <option value="zoomOutLeft">zoomOutLeft</option>
                                  <option value="zoomOutRight">zoomOutRight</option>
                                  <option value="zoomOutUp">zoomOutUp</option>
                                </optgroup>

                                <optgroup label="Specials">
                                  <option value="hinge">hinge</option>
                                  <option value="jackInTheBox">jackInTheBox</option>
                                  <option value="rollIn">rollIn</option>
                                  <option value="rollOut">rollOut</option>
                                </optgroup>
                          </select>
                      </div>
                    </div>

                    <button type="submit" name="submeter_slide" class="btn btn-success">Adicionar</button>

                  </form>
                  <?php

                   ?>
                </div>

                <div class="col-md-6 form-group" style="margin-top:1%;">
                  <h4 class="title">Slides</h4>
                  <hr>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Desc.</th>
                        <th scope="col">Btn?</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      //echo '<option value="'.$efect['code_texteffect'].'">'.$efect['desc_texteffect'].'</option>';
                      include '../../../php/conn.php';
                      $query = "SELECT id_slide,slide_state,image_slide,title_slide,desc_slide,button_slide FROM slider";
                      $slides = mysqli_query($conn,$query);
                      $ordem = 1;
                      while ($slide=mysqli_fetch_assoc($slides)) {
                        echo '
                        <tr>
                          <th scope="row">'.$ordem.'</th>
                          <td>'.$slide['title_slide'].'</td>
                          <td>'.$slide['desc_slide'].'</td>
                          <td>';
                          if ($slide['button_slide']=='on') {
                            echo '<i class="fa fa-check"></i>';
                          }
                          echo '</td>
                          <td>
                          <input type="hidden" name="" value="'.$slide['id_slide'].'">
                            <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs" onclick="">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="">
                                <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                        ';
                        $ordem = $ordem+1;
                      }?>
                    </tbody>
                  </table>

                </div>

              </div>
          </div>
      </div>
