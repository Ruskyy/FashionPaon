<script>
$(document).ready(function(){
	$("#4821").hide();
  $(".edit").click(function(){
    $("#4821").show();
  });
});
</script>
<div class="container-fluid">
    <div class="row">
          <div class="card" style="height:420px;">
            <div class="header">
              <h4 class="title">Produtos</h4>
              <p class="category">Gerir Stock</p>
              <div id="btscryp2" class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              </div>
            </div>
            <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped paginated2">
                  <thead>
                    <th>Tamanho</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                  </thead>
                  <tbody style="border:2px solid #bfbfbf;">
										<?php
											require_once '../../../php/functions.php';
											session_start();
												include '../../../php/conn.php';
										$id = $_POST['id'];
										$dado =mysqli_query($conn,"SELECT stock_id, stock_idproduto, stock_quantidade, stock_prodtamanho, stock_prodpreco FROM stock WHERE stock_idproduto = $id");
										while ($rows = mysqli_fetch_assoc($dado)){
											$queryidtamanho = "SELECT id_tamanho, nome_tamanho, id_categoria_tamanho FROM tamanho WHERE ".$rows['stock_prodtamanho']." = id_tamanho";
											$cat = mysqli_fetch_assoc(mysqli_query($conn, $queryidtamanho));
											 ?>
											 <tr>
												 <td><?php echo $cat['nome_tamanho']; ?></td>
												 <td><?php echo $rows['stock_quantidade']; ?></td>
												 <td><?php echo $rows['stock_prodpreco'].'€'; ?></td>
												 <td>
													 <button type="button" rel="tooltip" title="Comprar" class="btn btn-success btn-simple btn-xs" onclick="myFunction_SockEnc(<?php echo $rows['stock_id']; ?>)">
															 <i class="fa fa-shopping-cart"></i>
													 </button><!--
													 <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs" onclick="">
															 <i class="fa fa-edit"></i>
													 </button>-->
													 <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="">
															 <i class="fa fa-times"></i>
													 </button>
												 </td>
											 </tr>
											<?php
											}include '../../../php/deconn.php';?>
									</tbody>
                </table>
              <script>
                  $('table.paginated2').each(function() {
                      var currentPage = 0;
                      var numPerPage = 5;
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
  </div>
  <div id="4821" class="container-fluid" style="position:relative; top:-100px;left:-100px;">
    <div class="row">
      <div class="col-md-8">
      </div>
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produtos</h4>
                    <p id="btns" class="category">Gravar Stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                  <form class="" method="post" style="padding: 20px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Stock</label>
                                  <select class="form-control" name="categoria_stock">
                                    <option value="0">-- Select --</option>
                                    <!--
                                    $paises = mysqli_query($conn,"SELECT numero_pais, pais FROM pais ");
                                    while ($row=mysqli_fetch_assoc($paises)){
                                      echo '<option value="'.$row['numero_pais'].'">'.$row['pais'].'</option>';
                                    }
                                   -->
                                 </select>
                          </div>
                          <div class="form-group">
                              <label>Preço</label>
                              <input class="form-control form-control-lg" type="text" name="" value="" maxlength="6"oninput="this.value = this.value.replace(/[^0-9,]/g, '').replace(/(\,,*)\,/g, '$1');">
                          </div>
                        </div>
                        </div>
                      </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-lg btn-block" name="submeter" id="btn_sub"> Gravar </button>
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
