<?php
require_once '../../../php/functions.php';
session_start();
  include '../../../php/conn.php';
  $tipo = $_POST['tipo'];



  $dado =mysqli_query($conn,"SELECT  produto_id, produto_idcategoria, produto_nome, produto_desc, id_publico FROM produto ");
?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-6" >
            <div class="card">
                <div class="header">
                    <h4 class="title">Striped Table with Hover</h4>
                    <p id="btns" class="category">Here is a subtitle for this table</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead>
                          <th>Nome</th>
                          <th>Categoria</th>
                          <th>Género</th>
                        </thead>
                        <tbody>
                        <?php
                        while ($rows = mysqli_fetch_assoc($dado)){
                          $queryidcategoria = "SELECT categoria_nome FROM categoria WHERE ".$rows['produto_idcategoria']." = categoria_id ";
                          $cat = mysqli_fetch_assoc(mysqli_query($conn, $queryidcategoria));
                          $queryidpublico = "SELECT nome_publico FROM publico WHERE ".$rows['id_publico']." = id_publico ";
                          $pub = mysqli_fetch_assoc(mysqli_query($conn, $queryidpublico));?>
                            <tr>
                              <td><?php echo $rows["produto_nome"];?></td>
                              <td><?php echo $cat["categoria_nome"];?></td>
                              <td><?php echo $pub["nome_publico"];?></td>
                              <td>
                                <button type="button" rel="tooltip" title="Desconto" class="btn btn-success btn-simple btn-xs" onclick="">
                                    <i class="fa fa-ticket"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Informação" class="btn btn-warning btn-simple btn-xs" onclick="">
                                    <i class="fa fa-list-alt"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Gerir" class="btn btn-warning btn-simple btn-xs" onclick="myFunction_gerProdStock(<?php echo $rows['produto_id'];?>)">
                                    <i class="fa fa-cubes"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Gerir" class="btn btn-warning btn-simple btn-xs" onclick="myFunction_gerProdImg(<?php echo $rows['produto_id'];?>)">
                                    <i class="fa fa-image"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Informação" class="btn btn-info btn-simple btn-xs" onclick="">
                                    <i class="fa fa-list-alt"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Adicionar" class="btn btn-info btn-simple btn-xs" onclick="myFunction_addProdStock(<?php echo $rows['produto_id'];?>)">
                                    <i class="fa fa-cube"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Adicionar" class="btn btn-info btn-simple btn-xs" onclick="myFunction_addProdImg(<?php echo $rows['produto_id'];?>)">
                                    <i class="fa fa-file-image-o"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs" onclick="myFunction_editProd(<?php echo $rows['produto_id'];?>)">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs" onclick="myFunction_AllAddProd(<?php echo $rows['produto_id'];?>,1)">
                                    <i class="fa fa-times"></i>
                                </button>
                              </td>
                            </tr>
                            <?php }?>
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
      <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6" >
                <div class="card">
                    <div class="header">
                        <h4 class="title">Striped Table with Hover</h4>
                        <p id="btns" class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="content table-responsive table-full-width">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
              <div id="sub_sub_menu_aqui">

              </div>
            </div>
        </div>
      </div>
<?php
/**
  DADOS
    -ID
    -Quantidade
*/


    /*
    myFunction_editProd
    myFunction_addProdStock
    myFunction_addProdImg
    myFunction_gerProdStock
    myFunction_gerProdImg
    */
    ?>
        <script>
        var $table = document.getElementById("myTable"),
        $bttns = document.getElementById("btns"),
        // number of rows per page
        $n = 6,
        // number of rows of the table
        $rowCount = $table.rows.length,
        // get the first cell's tag name (in the first row)
        $firstRow = $table.rows[0].firstElementChild.tagName,
        // boolean var to check if table has a head row
        $hasHead = ($firstRow === "TH"),
        // an array to hold each row
        $tr = [],
        // loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
        $i,$ii,$j = ($hasHead)?1:0,
        // holds the first row if it has a (<TH>) & nothing if (<TD>)
        $th = ($hasHead?$table.rows[(0)].outerHTML:"");
        // count the number of pages
        var $pageCount = Math.ceil($rowCount / $n);
        // if we had one page only, then we have nothing to do ..
        if ($pageCount > 1) {
          // assign each row outHTML (tag name & innerHTML) to the array
          for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
          $tr[$ii] = $table.rows[$i].outerHTML;
          // create a div block to hold the buttons
          $bttns.insertAdjacentHTML("afterend","<div id='btscryp' class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'></div>");
          // the first sort, default page is the first one
          sort(1);
        }

        // ($p) is the selected page number. it will be generated when a user clicks a button
        function sort($p) {
          /* create ($rows) a variable to hold the group of rows
          ** to be displayed on the selected page,
          ** ($s) the start point .. the first row in each page, Do The Math
          */
          var $rows = $th,$s = (($n * $p)-$n);
          for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
          $rows += $tr[$i];

          // now the table has a processed group of rows ..
          $table.innerHTML = $rows;
          // create the pagination buttons
          document.getElementById("btscryp").innerHTML = pageButtons($pageCount,$p);
          // CSS Stuff
        }
        // ($pCount) : number of pages,($cur) : current page, the selected one ..
        function pageButtons($pCount,$cur) {
          /* this variables will disable the "Prev" button on 1st page
          and "next" button on the last one */
          var $prevDis = ($cur == 1)?"disabled":"",
          $nextDis = ($cur == $pCount)?"disabled":"",
          /* this ($buttons) will hold every single button needed
          ** it will creates each button and sets the onclick attribute
          ** to the "sort" function with a special ($p) number..
          */
          $buttons = "<div class='btn-group mr-2' role='group' aria-label='First group'>";
            $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
            /*for ($i=1; $i<=$pCount;$i++){
              $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
            }*/
            $buttons += "<input type='button' class='btn btn-secondary' style='padding:2px 10px;' class='btn btn-secondary' style='padding:2px 10px;' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+"></div>";
            return $buttons;
          }
        </script>
