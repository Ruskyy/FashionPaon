<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="header">
              <h4 class="title">Produtos</h4>
              <p class="category">Adicionar desconto ao produto</p>
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
                      <tr>
                        <td>XL</td>
                        <td>6</td>
                        <td>10,00€</td>
                        <td>
                          <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs edit" onclick="">
                              <i class="fa fa-edit"></i>
                          </button>
                          <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="">
                              <i class="fa fa-times"></i>
                          </button>
                        </td>
                      </tr>
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
